<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\InvalidRequestException;
use App\Http\Requests\Api\BusinessValidation\UpdateFormValidation;
use App\Http\Resources\Api\BusinessResource;
use App\Http\Resources\Api\BusinessStatusResource;
use App\Libraries\ResponseLibrary;
use App\Models\BusinessBusinessOption;
use App\Models\BusinessOption;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;

class BusinessController extends ApiBaseController
{
    use Authenticable, BusinessOptionable;

    /**
     * Get business of authenticated user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserBusiness()
    {
        $user = $this->getAuthUserOrFail();

        return ResponseLibrary::success([
            'successCode' => 'FETCHED',
            'business'    => new BusinessResource($user->business),
        ], 200);
    }

    /**
     * Get level, section and business option statuses of authenticated user's business
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserBusinessStatus()
    {
        $user = $this->getAuthUserOrFail();

        $data = [];
        $data['levelStatus'] = $user->business->levels()->get();
        $data['sectionStatus'] = $user->business->sections()->get();
        $data['businessOptionStatus'] = $user->business->businessOptions()->get();

        return ResponseLibrary::success([
            'successCode'    => 'FETCHED',
            'businessStatus' => new BusinessStatusResource($user->business, $data),
        ], 200);
    }

    /**
     * Save authenticated user's business
     *
     * @param UpdateFormValidation $request
     * @return \Illuminate\Http\JsonResponse
     * @throws InvalidRequestException
     */
    public function saveUserBusiness(UpdateFormValidation $request)
    {
        $business_option_id = $request->get('business_option_id');
        if (!$business_option_id) {
            throw new InvalidRequestException();
        }

        $user = $this->getAuthUserOrFail();
        $business = $user->business;
        $business_option = BusinessOption::findOrFail($business_option_id);

        $inputs = $request->only('business_name', 'sell_goods', 'business_category_id', 'website', 'abn');

        // Save User Business
        $business->fill($inputs)->save();

        // If Business Category Field present for saving, then need to refresh the business_business_option table
        if ($request->get('business_category_id')) {
            $this->refreshBusinessBusinessOption($business);
        }

        // Sync business_business_option table with current business_option new status
        $this->syncBusinessPivotTables($business, $business_option, [
            'business_category_id'   => $business->business_category_id,
            'business_option_status' => 'done',
        ]);

        // Refresh the statuses tables with new data
        $businessStatus = $this->refreshAllRelatedStatusForCurrentBusinessOption($business, $business_option);
        $business_option_status = BusinessBusinessOption::where('business_id', $business->id)
            ->where('business_option_id', $business_option->id)->first()->status;

        //return response
        return ResponseLibrary::success([
            'successCode'    => 'SAVED',
            'business'       => new BusinessResource($business->refresh()),
            'businessOption' => [
                'id'         => $business_option->id,
                'level_id'   => $business_option->level_id,
                'section_id' => $business_option->section_id,
                'status'     => $business_option_status,
            ],
            'businessStatus' => $businessStatus,
            'token'          => $this->getTokenFromUser($user),
        ], 200);
    }
}
