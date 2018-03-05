<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class LevelStatusResource extends Resource
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
            'completed_percent' => $this->pivot['completed_percent'],
            'last_updated' => $this->pivot['updated_at']
        ];
    }
}
