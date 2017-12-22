<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessResource;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends BaseApiController
{
    public function show(Business $business)
    {
        return new BusinessResource($business);
    }

    public function store(Request $request)
    {
        $business = Business::create($request->all());

        return new BusinessResource($business);
    }

    public function update(Request $request, Business $business)
    {

        $input = $request->all();
        $business->fill($input)->save();

        return new BusinessResource($business);
    }
}
