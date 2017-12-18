<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\LevelResource;
use App\Models\Level;

class LevelController extends BaseApiController
{
    public function index()
    {
        //initialize
        $data = [];

        //get data
        $levels = Level::with('parent', 'children')
            ->where('parent_id', null)
            ->orderBy('menu_order')
            ->get();

        //transform data
        $data = LevelResource::collection($levels);

        return response()->json($data, 200);
    }
}
