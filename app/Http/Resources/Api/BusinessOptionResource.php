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
        $next = $this->next();
        $previous = $this->previous();
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
            'affiliateLinks' => new AffiliateLinkResourceCollection($this->affiliateLinks),
        ];


        if ($this->getAuthUser()) {
            $returnData['businessMetas']  = new BusinessMetaResourceCollection($this->businessMetas);
            $returnData['status'] = $this->pivot['status'];
        }

        if ($next) {
            $returnData['next'] = [
                'id' => $next->id,
                'level_id' => $next->level_id,
                'section_id' => $next->section_id,
                'name' => $next->name,
                'slug' => $next->slug,
            ];
        }

        if ($previous) {
            $returnData['next'] = [
                'id' => $previous->id,
                'level_id' => $previous->level_id,
                'section_id' => $previous->section_id,
                'name' => $previous->name,
                'slug' => $previous->slug,
            ];
        }

        return $returnData;
    }
}
