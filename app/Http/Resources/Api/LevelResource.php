<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Route;

class LevelResource extends Resource
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'icon' => $this->icon,
            'badge_icon' => $this->icon,
            'badge_message' => $this->badge_message,
            'content' => $this->content,
            'tooltip' => $this->tooltip,
            'sections' => new SectionResourceCollection($this->sections)
        ];
    }
}
