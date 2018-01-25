<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessResource;
use App\Models\Business;
use App\Http\Requests\Api\BusinessValidation\CreateFormValidation;
use App\Http\Requests\Api\BusinessValidation\UpdateFormValidation;

class BusinessController extends BaseApiController
{
    public function show(Business $business)
    {
        return new BusinessResource($business);
    }

    public function store(CreateFormValidation $request)
    {
        //create business
        $business = Business::create($request->all());

        //update business_level pivot table
        //update business_section pivot table
        //update business_business_option pivot table

        return new BusinessResource($business);
    }

    public function update(UpdateFormValidation $request, Business $business)
    {

        $input = $request->all();
        $business->fill($input)->save();

        //update business table's extension tables depending upon the data provided
        //update business_level pivot table
        //update business_section pivot table
        //update business_business_option pivot table

        return new BusinessResource($business);
    }
}
