<?php

namespace App\Http\Resources\Api;

use App\Comment;
use App\Models\Level;
use App\People;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class LevelsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => LevelResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        $sub_levels = $this->collection->flatMap(
            function ($level) {
                return $level->children;
            }
        );
        $included = $sub_levels->unique();

        return [
            'links'    => [
                'self' => route('levels.index'),
            ],
            'included' => $this->withIncluded($included),
        ];
    }

    private function withIncluded(Collection $included)
    {
        return $included->map(
            function ($include) {
                if ($include instanceof Level) {
                    return new LevelResource($include);
                }
            }
        );
    }
}
