<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class BusinessOptionResource extends Resource
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
            'content' => $this->content,
        ];
    }
}
