<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\LevelResource;
use App\Http\Resources\Api\LevelsResource;
use App\Models\Level;

class SectionController extends BaseApiController
{
    public function index()
    {
        //get data
        $levels = Level::with('parent', 'children')
            ->where('parent_id', '!=',  null)
            ->orderBy('menu_order')
            ->paginate();
        return new LevelsResource($levels);

    }

    public function show(Level $level, Level $section)
    {
        LevelResource::withoutWrapping();
        return new LevelResource($section);
    }
}
