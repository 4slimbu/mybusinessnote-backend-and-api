<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessOptionResource;
use App\Http\Resources\Api\BusinessOptionResourceCollection;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;

class BusinessOptionController extends BaseApiController
{
    public function index(Level $level, Section $section)
    {
        //get data
        $business_options = BusinessOption::with('parent', 'children')
            ->where('section_id', $section->id)
            ->get();

        return new BusinessOptionResourceCollection($business_options);
    }

    public function show(Level $level, Section $section, BusinessOption $business_option)
    {
        $business_option->with('parent', 'children');

        $prev_business_option_id = BusinessOption::where('section_id', $section->id)
            ->where('parent_id', $business_option->parent_id)
            ->where('id', '<', $business_option->id)
            ->max('id');

        $next_business_option_id = BusinessOption::where('section_id', $section->id)
            ->where('parent_id', $business_option->parent_id)
            ->where('id', '>', $business_option->id)
            ->min('id');

        $links = [
            'self' => "/levels/{$level->id}/sections/{$section->id}/business-options/{$business_option->id}",
        ];

        if ($prev_business_option_id) {
            $links['prev'] = "/levels/{$level->id}/sections/{$section->id}/business-options/{$prev_business_option_id}";
        }

        if ($next_business_option_id) {
            $links['next'] = "/levels/{$level->id}/sections/{$section->id}/business-options/{$next_business_option_id}";
        }

        return (new BusinessOptionResource($business_option))->additional([
            'links' => $links
        ]);
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
