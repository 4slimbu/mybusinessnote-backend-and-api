<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\BusinessValidation\UpdateFormValidation;
use App\Http\Resources\Api\BusinessResource;
use App\Http\Resources\Api\BusinessStatusResource;
use App\Libraries\ResponseLibrary;
use App\Traits\Authenticable;
use Illuminate\Support\Facades\Cache;

class BusinessController extends BaseApiController
{
    use Authenticable;

    public function getUserBusiness()
    {
        $user = $this->getAuthUser();

        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'business' => new BusinessResource($user->business)
        ], 200);
    }

    public function getUserBusinessStatus()
    {
        $user = $this->getAuthUser();

//        TODO: make this pseudo-code work
//        if ($business->needRefresh) {
//            Cache::forget('business-status' . $user->id);
//            Business::fill(['needRefresh' => 0])->save();
//        }

        $data = Cache::remember('business-status' . $user->id, 0, function () use($user) {
            $array['level_status'] = $user->business->levels()->select('id')->get();
            $array['section_status'] = $user->business->sections()->select('id', 'completed_percent')->get();
            $array['business_option_status'] = $user->business->businessOptions()->select('id', 'status')->get();

            return $array;
        });

        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'business_status' => new BusinessStatusResource($user->business, $data)
        ], 200);
    }

    public function saveUserBusiness(UpdateFormValidation $request)
    {
        $inputs = $request->only('business_name', 'business_category_id', 'website', 'abn');

        $user = $this->getAuthUser();
        $user->business->fill($inputs)->save();

        return ResponseLibrary::success([
            'successCode' => 'SAVED',
            'business' => new BusinessResource($user->business->refresh()),
        ], 200);
    }
}
