<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\LevelResource;
use App\Http\Resources\Api\LevelResourceCollection;
use App\Models\Level;

class LevelController extends BaseApiController
{
    public function index()
    {
        //get data
        $levels = Level::with('sections')
            ->orderBy('menu_order')
            ->get();

        return new LevelResourceCollection($levels);

    }

    public function show(Level $level)
    {
        return new LevelResource($level);
    }
}
