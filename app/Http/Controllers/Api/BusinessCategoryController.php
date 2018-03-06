<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessCategoryResourceCollection;
use App\Libraries\ResponseLibrary;
use App\Models\BusinessCategory;

class BusinessCategoryController extends ApiBaseController
{
    public function index()
    {
        $business_categories = BusinessCategory::get();

        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'businessCategories' => new BusinessCategoryResourceCollection($business_categories)
        ], 200);
    }
}
