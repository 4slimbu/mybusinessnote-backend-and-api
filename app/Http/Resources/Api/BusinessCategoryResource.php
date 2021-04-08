<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class BusinessCategoryResource extends Resource
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'icon'       => asset($this->uploadDirectory . $this->icon),
            'hover_icon' => asset($this->uploadDirectory . $this->hover_icon),
            'tooltip'    => $this->tooltip,
        ];
    }
}
