<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessResource;
use App\Http\Resources\Api\LevelResourceCollection;
use App\Models\Business;
use App\Http\Requests\Api\BusinessValidation\CreateFormValidation;
use App\Http\Requests\Api\BusinessValidation\UpdateFormValidation;
use App\Models\Level;
use App\Models\Section;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getStatus($business_id) {
        //initialize
        $business = Business::where("id", $business_id)->first();

        //if no business or no auth user business, return with generic data
        if (! $business || Auth::id() !== $business->user->id) {
            $data = [
                "levels" => $this->getLevels($business),
                "sections" => $this->getSections($business),
            ];

            return response()->json($data, 200);
        }

        // else return with business data
        $data = [
            "business_id" => $business->id,
            "user_id" => $business->user->id,
            "business_category_id" => $business->businessCategory->id,
            "business_name" => $business->business_name,
            "levels" => $this->getLevels($business),
            "sections" => $this->getSections($business),
        ];

        return response()->json($data, 200);
    }

    private function getLevels($business)
    {
        //get data
        $data = [];
        $levels = Level::all();

        //get levels data and set completed_percent to 0
        foreach ($levels as $level) {
            $data[$level->id] = $level->toArray();
            $data[$level->id]["completed_percent"] = 0;
        }

        //set completed_percent to actual percent on touched levels
        if (isset($business->levels)) {
            foreach ($business->levels as $b_level) {
                $data[$b_level->id]["completed_percent"] = $b_level->pivot->completed_percent;
            }
        }

        return $data;
    }

    private function getSections($business)
    {
        //get data
        $data = [];
        $sections = Section::all();

        //get sections data and set completed_percent to 0
        foreach ($sections as $section) {
            $data[$section->id] = $section->toArray();
            $data[$section->id]["completed_percent"] = 0;
        }

        //set completed_percent to actual percent on touched sections
        if (isset($business->sections)) {
            foreach ($business->sections as $b_section) {
                $data[$b_section->id]["completed_percent"] = $b_section->pivot->completed_percent;
            }
        }

        return $data;
    }
}
