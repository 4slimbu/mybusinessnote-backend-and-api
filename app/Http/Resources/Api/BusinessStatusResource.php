<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class BusinessStatusResource extends Resource
{
    protected $levelStatus;

    protected $sectionStatus;

    protected $businessOptionStatus;

    public function __construct($resource, $data)
    {
        parent::__construct($resource);

        $this->levelStatus = isset($data['levelStatus']) ? $data['levelStatus'] : [];
        $this->sectionStatus = isset($data['sectionStatus']) ? $data['sectionStatus'] : [];
        $this->businessOptionStatus = isset($data['businessOptionStatus']) ? $data['businessOptionStatus'] : [];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $levelStatus = $this->levelStatus ? new LevelStatusResourceCollection($this->levelStatus): [];
        $sectionStatus = $this->sectionStatus ? new SectionStatusResourceCollection($this->sectionStatus): [];
        $businessOptionStatus = $this->businessOptionStatus ? new BusinessOptionStatusResourceCollection($this->businessOptionStatus): [];

        return [
            'levelStatuses'                   => $levelStatus,
            'sectionStatuses'                 => $sectionStatus,
            'businessOptionStatuses'         => $businessOptionStatus,
        ];
    }
}
