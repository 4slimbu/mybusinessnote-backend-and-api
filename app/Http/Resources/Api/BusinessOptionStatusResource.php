<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class BusinessOptionStatusResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'level_id' => $this->level_id,
            'section_id' => $this->section_id,
            'status' => $this->pivot['status'],
            'last_updated' => $this->pivot['updated_at']
        ];
    }
}
