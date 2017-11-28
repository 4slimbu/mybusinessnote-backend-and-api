<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\BusinessOption;

class PageController extends BaseController
{
    /**
     * Display a listing of the badge.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $level = Level::first();
        dd($level);
    }

    public function level(Level $level) {

        return view(parent::loadViewData('start.page.index'), compact('data'));
    }

    public function section(Level $section) {
        //initialize
        $data = [];

        $data['businesOption'] = BusinessOption::where('level_id', $section->id)->first();

        return view(parent::loadViewData('start.page.index'), compact('data'));
    }

    public function businessOption(BusinessOption $businessOption)
    {

    }
}
