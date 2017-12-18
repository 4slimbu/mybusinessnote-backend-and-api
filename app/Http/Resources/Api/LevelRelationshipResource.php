<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class LevelRelationshipResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'sub_levels' => (new LevelSublevelsRelationshipResource($this->children))->additional(['level' => $this]),
        ];
    }

    public function with($request)
    {
        return [
            'links' => [
                'self' => route('levels.index'),
            ],
        ];
    }
}
