<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessResource;
use App\Models\Business;
use App\Http\Requests\Api\BusinessValidation\CreateFormValidation;
use App\Http\Requests\Api\BusinessValidation\UpdateFormValidation;
use App\Models\Level;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class AppInitialController extends BaseApiController
{

    public function getInitialData($business_id) {
        //initialize
        $business = Business::where("id", $business_id)->first();

        //if no business or no auth user business, return with generic data
        Auth::loginUsingId(7);
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
