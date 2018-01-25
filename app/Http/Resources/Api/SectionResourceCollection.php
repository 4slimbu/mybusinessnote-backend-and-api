<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SectionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return SectionResource::collection($this->collection);
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
