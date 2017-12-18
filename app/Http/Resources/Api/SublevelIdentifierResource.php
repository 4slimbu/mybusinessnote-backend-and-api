<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class SublevelIdentifierResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'          => 'sub_levels',
            'id'            => (string)$this->id,
        ];
    }
}
