<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\LevelResourceCollection;
use App\Http\Resources\Api\SectionResourceCollection;
use App\Libraries\ResponseLibrary;
use App\Models\Level;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends ApiBaseController
{
    protected  $levelFields = ['id', 'name', 'slug', 'badge_icon', 'badge_message', 'content', 'tooltip'];
    protected  $sectionFields = ['id', 'level_id', 'name', 'slug', 'icon', 'tooltip'];
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

        return ResponseLibrary::success(['successCode' => 'FETCHED'] + $data, 200);

    }
}
