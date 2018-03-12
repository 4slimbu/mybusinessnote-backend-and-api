<?php

namespace App\Http\Resources\Api;

use App\Traits\Authenticable;
use Illuminate\Http\Resources\Json\Resource;

class LevelResource extends Resource
{
    use Authenticable;

    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        // always returned data
        $data = [
            'id'   => $this->id,
            'name' => $this->name,
        ];

        // query params
        $fieldString = $request->get('level_fields');
        $fields = explode(',', $fieldString);

        // extra data returned if corresponding query params exist
        if (in_array('slug', $fields) || !$fieldString) $data['slug'] = $this->slug;
        if (in_array('icon', $fields) || !$fieldString) $data['icon'] = asset($this->uploadDirectory . $this->icon);
        if (in_array('badge_icon', $fields) || !$fieldString) $data['badge_icon'] = asset($this->uploadDirectory . $this->badge_icon);
        if (in_array('badge_message', $fields) || !$fieldString) $data['badge_message'] = $this->badge_message;
        if (in_array('content', $fields) || !$fieldString) $data['content'] = $this->content;
        if (in_array('tooltip', $fields) || !$fieldString) $data['tooltip'] = $this->tooltip;
        if (in_array('sections', $fields) || !$fieldString) $data['sections'] = $this->sections->pluck('id');

        // return data
        return $data;
    }
}
