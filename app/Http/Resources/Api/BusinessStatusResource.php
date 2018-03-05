<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class BusinessStatusResource extends Resource
{
    protected $level_status;

    protected $section_status;

    protected $business_option_status;

    public function __construct($resource, $data)
    {
        parent::__construct($resource);

        $this->level_status = isset($data['level_status']) ? $data['level_status'] : [];
        $this->section_status = isset($data['section_status']) ? $data['section_status'] : [];
        $this->business_option_status = isset($data['business_option_status']) ? $data['business_option_status'] : [];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'level'                   => new LevelStatusResourceCollection($this->level_status),
            'section'                 => new SectionStatusResourceCollection($this->section_status),
            'business_option'         => new BusinessOptionStatusResourceCollection($this->business_option_status),
        ];
    }
}
