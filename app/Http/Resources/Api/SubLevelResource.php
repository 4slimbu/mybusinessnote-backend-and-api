<?php

namespace App\Http\Resources\Api;

use function foo\func;
use Illuminate\Http\Resources\Json\Resource;

class SubLevelResource extends Resource
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
            'name' => $this->name,
            'icon' => $this->icon,
        ];
    }
}
