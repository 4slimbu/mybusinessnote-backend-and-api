<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\LevelResourceCollection;
use App\Libraries\ResponseLibrary;
use App\Models\Level;

class LevelController extends ApiBaseController
{
    /**
     * Get levels along with related sections
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //get data
        $levels = Level::with('sections')
            ->get();

        return ResponseLibrary::success([
            'successCode' => 'RECEIVED',
            'levels' => new LevelResourceCollection($levels)
        ], 200);

    }
}
