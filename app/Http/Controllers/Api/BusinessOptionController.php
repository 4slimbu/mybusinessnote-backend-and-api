<?php

namespace App\Http\Controllers\Api;

use App\Models\BusinessOption;
use App\Models\Level;

class BusinessOptionController extends BaseApiController
{
    public function show(Level $level, Level $section, BusinessOption $business_option)
    {
        dd($level);
    }

    public function level(Level $level) {
        $data = [];
        $data['next'] = $level->children()->first();
        $data['prevNextLinks'] = $this->generatePrevNextLinks($level);

        return response()->json($data, 200);
    }

    public function section(Level $section) {
        //initialize
        $data = [];

        $data['businesOption'] = BusinessOption::where('level_id', $section->id)->first();

        return view(parent::loadViewData('start.page.index'), compact('data'));
    }

    public function page($page)
    {
        if ($page == 'home') {
            $level = Level::first();
            return $this->level($level);
        }
    }
}
