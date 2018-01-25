<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Route;

class SectionResource extends Resource
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => (string)$this->id,
            'name' => $this->name,
            //prevent infinite loop when called using relationship
            $this->mergeWhen(
                Route::currentRouteName() != 'levels.show' &&
                Route::currentRouteName() != 'levels.index'
                , [
                'level' => new LevelResource($this->level)
            ]),
//            'links'         => [
//                'self' => route('levels.show', ['level' => $this->id]),
//            ],
        ];
    }
}
