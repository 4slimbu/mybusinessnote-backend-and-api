<?php

namespace App\Http\Resources\Api;

use App\Models\BusinessSection;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Http\Resources\Json\Resource;

class SectionResource extends Resource
{
    use Authenticable, BusinessOptionable;
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $businessOptions = $this->businessOptions()->whereIn('id', $this->unlockedBusinessOptionIds())->pluck('id');

        return [
            'id' => $this->id,
            'level_id' => $this->level_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'icon' => asset($this->uploadDirectory . $this->icon),
            'tooltip' => $this->tooltip,
            'businessOptions' => $businessOptions
        ];
    }
}
