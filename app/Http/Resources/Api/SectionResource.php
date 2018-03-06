<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

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
            'id' => $this->id,
            'level_id' => $this->level_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'icon' => asset($this->uploadDirectory . $this->icon),
            'tooltip' => $this->tooltip
        ];
    }
}
