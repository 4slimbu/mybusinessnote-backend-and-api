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
    /**
     * Get levels along with related sections
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        //get data
        $levels = Level::all();

        $data = [];
        $data['levels'] = new LevelResourceCollection($levels);


        $relations = explode(',', $request->get('with'));
        
        if (in_array('sections', $relations)) {
            $sections = Section::whereIn('level_id', $levels->pluck('id'))->get();
            $data['sections'] = new SectionResourceCollection($sections);
        }

        return ResponseLibrary::success(['successCode' => 'FETCHED'] + $data, 200);

    }
}
