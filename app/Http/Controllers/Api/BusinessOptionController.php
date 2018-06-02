<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessOptionResource;
use App\Http\Resources\Api\BusinessOptionResourceCollection;
use App\Libraries\ImageLibrary;
use App\Libraries\ResponseLibrary;
use App\Models\BusinessMeta;
use App\Models\BusinessOption;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Http\Request;

class BusinessOptionController extends ApiBaseController
{
    use BusinessOptionable, Authenticable;

    protected $businessOptionFields = ['id', 'level_id', 'section_id', 'name', 'slug', 'element', 'element_data', 'tooltip_title', 'tooltip', 'menu_order'];

    public function index(Request $request)
    {
        // get only unlocked by default business options
        $query = BusinessOption::select($this->businessOptionFields);

        // if level
        if ($request->get('level')) {
            $query->where('level_id', $request->get('level'));
        }

        // if section, get only business option with section_id
        if ($request->get('section')) {
            $query->where('section_id', $request->get('section'));
        }

        // order by menu order
        $business_options = $query->orderBy('menu_order')->get();

        //get affiliate links
        $business_options->load('affiliateLinks');

        return ResponseLibrary::success([
            'successCode'    => 'FETCHED',
            'businessOptions' => new BusinessOptionResourceCollection($business_options),
        ], 200);
    }

    /**
     * Get business option with business meta and partner's affiliate links
     * associated with it
     *
     * @param BusinessOption $business_option
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(BusinessOption $business_option)
    {
        $data = [];
        $authUser = $this->getAuthUser();

        if ($authUser) {
            $business = $authUser->business;
            $business_option = $business->businessOptions()
                ->where('business_business_option.business_option_id', $business_option->id)->first();

            // load business meta
            $business_option->load(['businessMetas' => function ($query) use($business) {
                $query->where('business_id', $business->id);
            }]);
        }

        //get affiliate links
        $business_option->load('affiliateLinks');

        return ResponseLibrary::success([
            'successCode'    => 'FETCHED',
            'businessOption' => new BusinessOptionResource($business_option),
        ], 200);
    }

    /**
     * Save business option of authenticated user
     * It also trigger various events to sync the business status
     *
     * @param Request $request
     * @param BusinessOption $business_option
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\InvalidImageException
     * @throws \App\Exceptions\SaveImageException
     */
    public function save(Request $request, BusinessOption $business_option)
    {
        $authUser = $this->getAuthUserOrFail();

        $business = $authUser->business;
        $business_meta = $request->get('business_meta') ? $request->get('business_meta') : [];

        if ($business_meta) {
            // save business metas
            $this->saveBusinessMetas($business, $business_option, $business_meta);
            $data = [
                'business_category_id'   => $business->business_category_id,
                'business_option_status' => 'done',
            ];
            $this->unlockNextBusinessOption($business, $business_option);
            $syncResponse = $this->syncBusinessPivotTables($business, $business_option, $data);

        } else {
            if (
                $request->get('business_option_status') === 'irrelevant' ||
                $request->get('business_option_status') === 'skipped'
            ) {
                $business_option_status = $request->get('business_option_status');
                BusinessMeta::where('business_id', $business->id)->where('business_option_id', $business_option->id)->delete();

                $data = [
                    'business_category_id'   => $business->business_category_id,
                    'business_option_status' => $business_option_status,
                ];
                $this->unlockNextBusinessOption($business, $business_option);
                $syncResponse = $this->syncBusinessPivotTables($business, $business_option, $data);
            }
        }

        // prepare data
        $business_option = $business->businessOptions()
            ->where('business_business_option.business_option_id', $business_option->id)->first();

        // load business meta
        $business_option->load(['businessMetas' => function ($query) use($business) {
            $query->where('business_id', $business->id);
        }]);

        $businessStatus = $this->refreshAllRelatedStatusForCurrentBusinessOption($business, $business_option);

        //return response
        return ResponseLibrary::success([
            'successCode'    => 'SAVED',
            'businessOption' => new BusinessOptionResource($business_option),
            'businessStatus' => $businessStatus,
            'token'          => $this->getTokenFromUser($authUser),
        ] + $syncResponse, 200);
    }

    /**
     * Save business metas related to business option
     *
     * @param $business
     * @param $business_option
     * @param $business_meta
     * @throws \App\Exceptions\InvalidImageException
     * @throws \App\Exceptions\SaveImageException
     */
    private function saveBusinessMetas($business, $business_option, $business_meta)
    {
        foreach ($business_meta as $key => $value) {
            $data = [];
            //TODO: improve image handling
            if (ImageLibrary::isBase64Image($value)) {
                $newImageName = uniqid($key . "_") . '.jpg';
                $value = ImageLibrary::saveBase64Image($value, $business_option->uploadDirectory, $newImageName);
                $data['type'] = 'file';
            }

            $businessMeta = $business->businessMetas()
                ->where('business_option_id', $business_option->id)
                ->where('key', $key)
                ->first();

            if ($businessMeta) {
                $data = $data + ['value' => $value];
                $businessMeta->fill($data)->save();
            } else {
                $data = $data + [
                        'business_option_id' => $business_option->id,
                        'key'                => $key,
                        'value'              => $value,
                    ];

                $business->businessMetas()->create($data);
            }

        }
    }

}
