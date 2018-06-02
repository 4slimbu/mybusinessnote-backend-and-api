<?php

namespace App\Http\Resources\Api;

use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Http\Resources\Json\Resource;

class BusinessOptionResource extends Resource
{
    use Authenticable, BusinessOptionable;

    public function __construct($resource, $data = null)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $returnData = [
            'id'             => $this->id,
            'level_id'       => $this->level_id,
            'section_id'     => $this->section_id,
            'name'           => $this->name,
            'slug'           => $this->slug,
            'content'        => $this->content,
            'element'        => $this->element,
            'tooltip_title' => $this->tooltip_title,
            'tooltip'        => $this->tooltip,
            'menu_order'     => $this->menu_order,
            'weight'         => $this->weight,
            'status'         => $this->getStatus(),
            'affiliateLinks' => new AffiliateLinkResourceCollection($this->affiliateLinks),
            'children'      => new BusinessOptionResourceCollection($this->children)
        ];


        if ($this->getAuthUser()) {
            $returnData['businessMetas']  = new BusinessMetaResourceCollection($this->businessMetas);
            $returnData['status'] = $this->getStatus();
        }

        return $returnData;
    }
}
