<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Route;

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
            'id'            => (string)$this->id,
            'name' => $this->name,
            'white_icon' => asset('images/icons/white/' . $this->icon ),
            'red_icon' => asset('images/icons/red/' . $this->icon ),
            'tooltip' => $this->tooltip
        ];
    }
}