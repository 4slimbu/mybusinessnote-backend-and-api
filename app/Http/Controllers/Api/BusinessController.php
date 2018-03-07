<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\BusinessValidation\UpdateFormValidation;
use App\Http\Resources\Api\BusinessResource;
use App\Http\Resources\Api\BusinessStatusResource;
use App\Libraries\ResponseLibrary;
use App\Traits\Authenticable;
use Illuminate\Support\Facades\Cache;

class BusinessController extends ApiBaseController
{
    use Authenticable;

    /**
     * Get business of authenticated user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserBusiness()
    {
        $user = $this->getAuthUser();

        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'business' => new BusinessResource($user->business)
        ], 200);
    }

    /**
     * Get level, section and business option statuses of authenticated user's business
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserBusinessStatus()
    {
        $user = $this->getAuthUser();

        $data = [];
        $data['levelStatus'] = $user->business->levels()->get();
        $data['sectionStatus'] = $user->business->sections()->get();
        $data['businessOptionStatus'] = $user->business->businessOptions()->get();

        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'businessStatus' => new BusinessStatusResource($user->business, $data)
        ], 200);
    }

    /**
     * Save authenticated user's business
     *
     * @param UpdateFormValidation $request
     * @return \Illuminate\Http\JsonResponse
     */
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
