<?php

namespace App\Http\Resources\Api;

use App\Traits\Authenticable;
use Illuminate\Http\Resources\Json\Resource;

class BusinessOptionResource extends Resource
{
    use Authenticable;
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
        $business_meta = [];
        $business_business_option_status = null;
        if ($user = $this->getAuthUser()) {
            $business_meta = $this->businessMetas()->where('business_id', $user->business->id)->get();
            if (count($business_meta) > 0) {
                $business_meta = $business_meta->pluck('value', 'key')->toArray();
            }
            $business_business_option_status = $this->business()->where('business_id', $user->business->id)->select('status')->first();
            if ($business_business_option_status) {
                $business_business_option_status = $business_business_option_status->status;
            }
        }

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
            'business_meta' => $business_meta,
            'business_business_option_status' => $business_business_option_status,
            'links' => [
                'prev' => '/level/' . $this->level->id . '/section/' . $this->section->id . '/business-option/' . $this->id . '/previous',
                'self' => '/level/' . $this->level->id . '/section/' . $this->section->id . '/business-option/' . $this->id,
                'next' => '/level/' . $this->level->id . '/section/' . $this->section->id . '/business-option/' . $this->id . '/next'
            ]
        ];
    }
}
