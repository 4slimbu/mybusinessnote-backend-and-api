<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class SectionStatusResource extends Resource
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
            'last_updated' => $this->pivot['completed_percent'],
            'completed_on' => $this->pivot['updated_at']
        ];
    }
}
