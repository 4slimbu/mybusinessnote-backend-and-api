<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Route;

class BusinessMetaResource extends Resource
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $value = ($this->type === 'file') ? asset($this->uploadDirectory . $this->value) : $this->value;
        return [
            'id' => $this->id,
            'key' => $this->key,
            'value' => $value,
        ];
    }
}
