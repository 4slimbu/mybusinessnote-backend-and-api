<?php

namespace App\Http\Controllers\Api;

use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;

class PageController extends BaseApiController
{
    public function home()
    {
        $level = Level::orderBy('menu_order')->first();
        return $this->level($level);
    }

    public function level(Level $level) {
        $data = [];
        $data['next'] = $level->children()->first();
        $data['prevNextLinks'] = $this->generatePrevNextLinks($level);

        return response()->json($data, 200);
    }

    public function section(Level $level, Section $section) {
        //initialize
        $data = [];

        dd("here");

        $data['businesOption'] = BusinessOption::where('level_id', $level->id)->where('section_id', $section->id)->first();

        return view(parent::loadViewData('start.page.index'), compact('data'));
    }

    public function businessOption(BusinessOption $businessOption)
    {

    }

    public function page($page)
    {
        if ($page == 'home') {
            $level = Level::first();
            return $this->level($level);
        }
    }
}
