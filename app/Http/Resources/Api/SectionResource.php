<?php

namespace App\Http\Resources\Api;

use App\Traits\Authenticable;
use Illuminate\Http\Resources\Json\Resource;

class SectionResource extends Resource
{
    use Authenticable;
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        try {
            $user =  $this->getAuthUser();
        } catch (\Exception $exception) {
            $user = null;
        }

        if ($user) {
            $businessOptions = $user->business->businessOptions()->where('section_id', $this->id)->pluck('id');
        } else {
            $businessOptions = $this->businessOptions->pluck('id');
        }

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
