<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessCategoryResource;
use App\Http\Resources\Api\BusinessCategoryResourceCollection;
use App\Models\BusinessCategory;

class BusinessCategoryController extends BaseApiController
{
    public function index()
    {
        //get data
        $business_categories = BusinessCategory::get();
        return new BusinessCategoryResourceCollection($business_categories);

    }

    public function show(BusinessCategory $business_category)
    {
        return new BusinessCategoryResource($business_category);
    }
}
