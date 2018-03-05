<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessCategoryResource;
use App\Http\Resources\Api\BusinessCategoryResourceCollection;
use App\Libraries\ResponseLibrary;
use App\Models\BusinessCategory;

class BusinessCategoryController extends BaseApiController
{
    public function index()
    {
        //get data
        $business_categories = BusinessCategory::get();

        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'businessCategories' => new BusinessCategoryResourceCollection($business_categories)
        ], 200);
    }
}
