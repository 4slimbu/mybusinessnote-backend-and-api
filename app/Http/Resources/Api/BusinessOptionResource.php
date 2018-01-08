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
            'slug' => $this->slug,
            'content' => $this->content,
            'element' => $this->element,
            'tooltip' => $this->tooltip,
            'weight' => $this->weight,
            //prevent infinite loop when called using relationship
            'affiliate_links' => $this->affiliateLinks,
            'links' => [
                'self' => route('api.business-option.show', [$this->level->slug, $this->section->slug, $this->slug])
            ]
        ];
    }
}
