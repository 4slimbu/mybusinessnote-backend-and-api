<?php

namespace App\Http\Controllers\UserDashboard;


use App\Models\BusinessMeta;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Session, AppHelper, PDF;


class CategoriesPreferenceController extends BaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'user-dashboard.categories-preference';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'user-dashboard.categories-preference';

    /**
     * Title of page using this controller
     * @var string
     */
    protected $panel_name = 'Categories Preferences';

    /**
     * Array of panel actions
     * @var string
     */
    protected $panel_actions = array( 

        [ ]
    );


    /**
     * Displays user business status grouped by categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $data['user'] = Auth::user()->load('business');
        $relatedBusinessOptions = $data['user']->business->businessOptions()->select('id', 'level_id', 'section_id', 'name', 'status')->get();
        $relatedBusinessOptions->load('level', 'section');
        $data['groupedBusinessOptions'] = $this->groupBySectionSlug($data['user']->business, $relatedBusinessOptions);

        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

    /**
     * This groups given business options collection by section > business option
     *
     * @param $business
     * @param $businessOptions
     * @internal param $businessOption
     * @return array
     */
    private function groupBySectionSlug($business, $businessOptions)
    {
        //instantiate
        $data = [];

        //this grouping excludes level one
        $sections = Section::with('level')->where('level_id', '!=', 1)
            ->groupBy('slug')
            ->get();

        $businessMetas = BusinessMeta::where('business_id', $business->id)->get();

        if ($sections) {
            foreach ($sections as $section) {
                $data[] = [
                    'id' => $section->id,
                    'name' => $section->name,
                    'businessOptions' => $this->getRelatedBusinessOptions($section, $businessOptions, $businessMetas)
                ];
            }
        }

        return $data;
    }

    /**
     * Get related business options for given section, business and business options
     *
     * @param $section
     * @param $businessOptions
     * @param $businessMetas
     * @return array
     * @internal param $business
     * @internal param $business
     */
    private function getRelatedBusinessOptions($section, $businessOptions, $businessMetas)
    {
        $data = [];

        if ($section && $businessOptions) {
            foreach ($businessOptions as $businessOption) {
                if ($businessOption->section->slug === $section->slug) {
                    //status
                    //show only ones that are already viewed by user
                    $status = ($businessOption->status) ? $businessOption->status : '';
                    if ($status === 'not_touched') {
                        continue;
                    }

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
                        'url' => getenv('REACT_APP_URL') . '/level/' . $businessOption->level->slug . '/section/'
                            . $businessOption->section->slug . '/bo/' . $businessOption->id . '/?token='
                            . $this->getJwtTokenFromUser(Auth::user()),
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
                if ($item->key === 'sec_brand_color') {
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
