<?php

namespace App\Http\Resources\Api;

use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Http\Resources\Json\Resource;

class BusinessOptionResource extends Resource
{
    use Authenticable, BusinessOptionable;

    protected $affiliateLinks;
    protected $businessMetas;

    public function __construct($resource, $data = null)
    {
        parent::__construct($resource);
        $this->affiliateLinks = isset($data['affiliateLinks']) ? $data['affiliateLinks'] : [];
        $this->businessMetas = isset($data['businessMetas']) ? $data['businessMetas'] : [];
    }

    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $affiliateLinks = ($this->affiliateLinks) ? new AffiliateLinkResourceCollection($this->affiliateLinks) : [];
        $businessMetas = ($this->businessMetas) ? new BusinessMetaResourceCollection($this->businessMetas) : [];
        $returnData = [
            'id'             => $this->id,
            'level_id'       => $this->level_id,
            'section_id'     => $this->section_id,
            'name'           => $this->name,
            'slug'           => $this->slug,
            'content'        => $this->content,
            'element'        => $this->element,
            'tooltip'        => $this->tooltip,
            'menu_order'     => $this->menu_order,
            'weight'         => $this->weight,
            'affiliateLinks' => $affiliateLinks,
            'businessMetas'  => $businessMetas,
            'status'         => $this->pivot['status'],
        ];

        return $returnData;
    }
}
