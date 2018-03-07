<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessCategoryResourceCollection;
use App\Libraries\ResponseLibrary;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Traits\BusinessOptionable;

class BusinessCategoryController extends ApiBaseController
{
    use BusinessOptionable;
    /**
     * Get all the business categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->refreshBusinessBusinessOption(Business::find(13));

        $business_categories = BusinessCategory::get();

        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'businessCategories' => new BusinessCategoryResourceCollection($business_categories)
        ], 200);
    }
}
