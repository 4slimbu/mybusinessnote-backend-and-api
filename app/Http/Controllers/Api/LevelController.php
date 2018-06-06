<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\BusinessOptionResourceCollection;
use App\Http\Resources\Api\LevelResource;
use App\Http\Resources\Api\LevelResourceCollection;
use App\Http\Resources\Api\SectionResourceCollection;
use App\Libraries\ResponseLibrary;
use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Section;
use Illuminate\Http\Request;

class LevelController extends ApiBaseController
{
    protected  $levelFields = ['id', 'name', 'slug', 'icon', 'badge_icon', 'badge_message', 'content', 'tooltip_title', 'tooltip', 'template', 'is_active', 'is_down', 'down_message'];
    protected  $sectionFields = ['id', 'level_id', 'name', 'slug', 'icon', 'hover_icon', 'tooltip_title', 'tooltip', 'show_landing_page', 'template', 'is_active'];

    /**
     * Get levels along with related sections
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        //get data
        $levels = Level::all($this->levelFields);

        $data = [];
        $data['levels'] = new LevelResourceCollection($levels);


        $relations = explode(',', $request->get('with'));

        if (in_array('sections', $relations)) {
            $sections = Section::whereIn('level_id', $levels->pluck('id'))->get($this->sectionFields);
            $data['sections'] = new SectionResourceCollection($sections);
        }

        if (in_array('business-options', $relations)) {
            $businessOptions = BusinessOption::whereIn('level_id', $levels->pluck('id'))->get();
            $data['businessOptions'] = new BusinessOptionResourceCollection($businessOptions);
        }

        return ResponseLibrary::success(['successCode' => 'FETCHED'] + $data, 200);

    }

    public function show(Request $request, Level $level)
    {
        //get data

        $data = [];
        $data['level'] = new LevelResource($level);


        $relations = explode(',', $request->get('with'));

        if (in_array('sections', $relations)) {
            $sections = Section::where('level_id', $level->id)->get($this->sectionFields);
            $data['sections'] = new SectionResourceCollection($sections);
        }

        return ResponseLibrary::success(['successCode' => 'FETCHED'] + $data, 200);
    }
}
