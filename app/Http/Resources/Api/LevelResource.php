<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Route;

class LevelResource extends Resource
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
//            'links'         => [
//                'self' => route('levels.show', ['level' => $this->id]),
//            ],
            //prevent infinite loop when called using relationship
            $this->mergeWhen(
                Route::currentRouteName() != 'sections.show' &&
                Route::currentRouteName() != 'sections.index'
                , [
                'sections' => new SectionResourceCollection($this->sections)
            ]),

        ];
    }
}
