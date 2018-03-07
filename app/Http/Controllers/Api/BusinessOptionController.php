<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessOptionResource;
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
            $business_option = $authUser->business->businessOptions()
                ->where('business_business_option.business_option_id', $business_option->id)->first();

            $data['businessMetas'] = $business_option->businessMetas()
                ->where('business_id', $authUser->business->id)->get();
        }

        $data['affiliateLinks'] = $business_option->affiliateLinks()->get();

        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'businessOption' => new BusinessOptionResource($business_option, $data)
        ], 200);
    }

    /**
     * Save business option of authenticated user
     * It also trigger various events to sync the business status
     *
     * @param Request $request
     * @param BusinessOption $business_option
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, BusinessOption $business_option)
    {
        $authUser = $this->getAuthUser();

        $business = $authUser->business;
        $business_meta = $request->get('business_meta') ? $request->get('business_meta') : [];

        foreach ($business_meta as $key => $value) {
            //TODO: improve image handling
            if (ImageLibrary::isBase64Image($value)) {
                $newImageName = uniqid($key . "_") . '.jpg';
                $value = ImageLibrary::saveBase64Image($value, $business_option->uploadDirectory, $newImageName);
            }

            $businessMeta = $business->businessMetas()
                ->where('business_option_id', $business_option->id)
                ->where('key', $key)
                ->first();

            if ($businessMeta) {
                $businessMeta->fill(['value' => $value])->save();
            } else {
                $business->businessMetas()->create([
                    'business_option_id' => $business_option->id,
                    'key' => $key,
                    'value' => $value
                ]);
            }

        }

        // Sync business option status
        $business_option_status = 'done';
        if (
                $request->get('business_option_status') === 'irrelevant' ||
                $request->get('business_option_status') === 'skipped'
            ) {
            $business_option_status = $request->get('business_option_status');
            BusinessMeta::where('business_id', $business->id)->where('business_option_id', $business_option->id)->delete();
        }

        $data = [
            'business_category_id' => $business->business_category_id,
            'business_option_status' => $business_option_status
        ];
        $this->syncBusinessPivotTables($business, $business_option, $data);

        if ($authUser) {
            $business_option = $authUser->business->businessOptions()
                ->where('business_business_option.business_option_id', $business_option->id)->first();

            $data['businessMetas'] = $business_option->businessMetas()
                ->where('business_id', $authUser->business->id)->get();
        }

        $data['affiliateLinks'] = $business_option->affiliateLinks()->get();

        //return response
        return ResponseLibrary::success([
            'successCode' => 'SAVED',
            'businessOption' => new BusinessOptionResource($business_option, $data),
        ], 200);
    }

}
