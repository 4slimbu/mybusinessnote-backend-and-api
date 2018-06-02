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

    protected $businessCategory;

    public function __construct()
    {
        $this->businessCategory = new BusinessCategory();
    }

    /**
     * Get all the business categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $business_categories = $this->businessCategory->getActive();

        return ResponseLibrary::success([
            'successCode'        => 'FETCHED',
            'businessCategories' => new BusinessCategoryResourceCollection($business_categories),
        ], 200);
    }
}
