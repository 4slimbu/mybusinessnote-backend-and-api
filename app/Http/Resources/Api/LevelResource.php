<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class LevelResource extends Resource
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
            'type' => 'level',
            'attributes' => [
                'name' => $this->name,
                'icon' => $this->icon,
            ],
            'links' => [
                'self' => '',
                'next' => '',
                'previous' => ''
            ],
            'children' => new SubLevelResource($this)
        ];
    }
}
