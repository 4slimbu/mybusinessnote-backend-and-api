<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class LevelResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
<<<<<<< HEAD
=======
     *
>>>>>>> develop
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'          => 'levels',
            'id'            => (string)$this->id,
            'attributes'    => [
                'name' => $this->name,
            ],
            'relationships' => new LevelRelationshipResource($this),
            'links'         => [
                'self' => route('levels.show', ['level' => $this->id]),
            ],
        ];
    }
}
