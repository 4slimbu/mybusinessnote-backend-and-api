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
        $business = Business::create($request->all());

        return new BusinessResource($business);
    }

    public function update(UpdateFormValidation $request, Business $business)
    {

        $input = $request->all();
        $business->fill($input)->save();

        return new BusinessResource($business);
    }
}
