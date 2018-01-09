<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class BusinessOptionResource extends Resource
{
    protected $additionalData;

    public function __construct($resource, $additionalData = null)
    {
        parent::__construct($resource);
        $this->additionalData = $additionalData;
    }

    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'level_id' => $this->level->id,
            'level_slug' => $this->level->slug,
            'section_id' => $this->section->id,
            'section_slug' => $this->section->slug,
            'name' => $this->name,
            'slug' => $this->slug,
            'content' => $this->content,
            'element' => $this->element,
            'tooltip' => $this->tooltip,
            'weight' => $this->weight,
            //prevent infinite loop when called using relationship
            'affiliate_links' => $this->affiliateLinks,
            'links' => [
                'prev' => route('api.business-option.show', [$this->level->id, $this->section->id, $this->id]) . '/prev',
                'self' => route('api.business-option.show', [$this->level->id, $this->section->id, $this->id]),
                'next' => route('api.business-option.show', [$this->level->id, $this->section->id, $this->id]) . '/next'
            ]
        ];
    }
}
