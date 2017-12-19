<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LevelSublevelsRelationshipResource extends ResourceCollection
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
        $level = $this->additional['level'];

        return [
            'data'  => SublevelIdentifierResource::collection($this->collection),
            'links' => [
                'self' => route('levels.show', ['level' => $level->id]),
            ],
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
