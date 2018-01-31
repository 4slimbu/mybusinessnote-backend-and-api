<?php

namespace App\Http\Controllers\UserDashboard;


use App\Http\Requests\Admin\UserValidation\CreateFormValidation;
use App\Http\Requests\Admin\UserValidation\UpdateFormValidation;
use App\Models\BusinessMeta;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Role;
use App\Models\User;
use function foo\func;
use Illuminate\Support\Facades\Auth;
use Session, AppHelper;


class DashboardController extends BaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'user-dashboard.dashboard';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'user-dashboard.dashboard';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'User Dashboard';

    /**
     * Displays user dashboard with user and business info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $data['user'] = User::with('business')->where('id', Auth::user()->id)->first();
        $relatedBusinessOptions = $data['user']->business->businessOptions()->select('id', 'section_id', 'name', 'status')->get();
        $data['groupedBusinessOptions'] = $this->groupByLevelAndSection($data['user']->business, $relatedBusinessOptions);


        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

    /**
     * This groups given business options collection by level > section > business option
     *
     * @param $business
     * @param $businessOptions
     * @internal param $businessOption
     * @return array
     */
    private function groupByLevelAndSection($business, $businessOptions)
    {
        //instantiate
        $data = [];

        //this grouping is excludes level one
        $levels = Level::with('sections')->where('id', '!=', 1)->get();
        $businessMetas = BusinessMeta::where('business_id', $business->id)->get();

        if ($levels) {
            foreach ($levels as $level) {
                $data[] = [
                    'id' => $level->id,
                    'name' => $level->name,
                    'sections' => $this->getRelatedSections($level, $business, $businessOptions, $businessMetas)
                ];
            }
        }

        return $data;
    }

    /**
     * Gets related section for given level, business and business options
     *
     * @param $level
     * @param $business
     * @param $businessOptions
     * @param $businessMetas
     * @return array
     * @internal param $business
     */
    private function getRelatedSections($level, $business, $businessOptions, $businessMetas)
    {
        $data = [];
        if ($level->sections) {
            foreach ($level->sections as $section) {
                $data[] = [
                    'id' => $section->id,
                    'name' => $section->name,
                    'businessOptions' => $this->getRelatedBusinessOptions($section, $business, $businessOptions, $businessMetas)
                ];
            }
        }

        return $data;
    }

    /**
     * Get related business options for given section, business and business options
     *
     * @param $section
     * @param $business
     * @param $businessOptions
     * @param $businessMetas
     * @return array
     * @internal param $business
     */
    private function getRelatedBusinessOptions($section, $business, $businessOptions, $businessMetas)
    {
        $data = [];

        if ($section && $businessOptions) {
            foreach ($businessOptions as $businessOption) {
                if ($businessOption->section_id === $section->id) {
                    //status
                    $businessOptionWithStatus = $business->businessOptions()->select('status')->where('business_option_id', $businessOption->id)->first();
                    $status = ($businessOptionWithStatus) ? $businessOptionWithStatus->status : '';

                    //business meta
                    $businessMetaData = $businessMetas->filter(function ($value, $key) use($businessOption) {
                        return $value->business_option_id === $businessOption->id;
                    });

                    $transformedBusinessMetaData = $this->transformBusinessMetaData($businessMetaData);

                    //return data
                    $data[] = [
                        'id' => $businessOption->id,
                        'name' => $businessOption->name,
                        'status' => $status,
                        'businessMetas' => $transformedBusinessMetaData
                    ];
                }
            }
        }

        return $data;
    }

    /**
     * This transforms business meta data to suitable output for displaying
     *
     * @param $businessMetaData
     * @return array
     * @internal param $businessMeta
     */
    private function transformBusinessMetaData($businessMetaData)
    {
        $data = [];

        if ($businessMetaData) {
            foreach ($businessMetaData as $item) {
                $value = $item->value;
                //for logo
                if ($item->key === 'logo') {
                    $value = '<img width="50" src="' . asset('/images/business-options/' . $item->value) . '" />';
                }
                //for brand color
                if ($item->key === 'brand_color') {
                    $value = '<div width="30" height="30" style="width:20px; height:20px; background-color:'. $item->value .';"></div>';
                }

                $data[] = [
                    'id' => $item->id,
                    'business_id' => $item->business_id,
                    'business_option_id' => $item->business_option_id,
                    'value' => $value
                ];
            }
        }

        return $data;
    }

}
