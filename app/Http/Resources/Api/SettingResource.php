<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class SettingResource extends Resource
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => (string) $this->id,
            'name'  => $this->name,
            'key'   => $this->key,
            'value' => $this->value,
        ];
    }
}
