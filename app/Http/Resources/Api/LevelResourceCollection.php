<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LevelResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => LevelResource::collection($this->collection)
        ];
    }

    public function with($request)
    {
        return [
            'links'    => [
                'self' => route('levels.index'),
            ]
        ];
    }
}
