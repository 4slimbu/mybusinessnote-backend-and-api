<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

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
            'id'                   => $this->id,
            'business_name'        => $this->business_name,
            'user_id'              => $this->user_id,
            'business_category_id' => $this->business_category_id,
            'sell_goods'           => $this->sell_goods,
            'website'              => $this->website,
            'abn'                  => $this->abn,
        ];
    }
}
