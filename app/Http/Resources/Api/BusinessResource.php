<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Route;

class BusinessResource extends Resource
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
            'business_name' => $this->business_name,
            'user_id' => $this->user_id,
            'business_category_id' => $this->business_category_id,
            'website' => $this->website,
            'abn' => $this->abn,
            'acn' => $this->acn
        ];
    }
}
