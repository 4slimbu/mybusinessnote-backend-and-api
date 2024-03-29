<?php

namespace App\Http\Resources\Api;

use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Http\Resources\Json\Resource;

class SectionResource extends Resource {
	use Authenticable, BusinessOptionable;

	/**
	 * Transform the resource into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	public function toArray( $request ) {
		return [
			'id'                => $this->id,
			'level_id'          => $this->level_id,
			'name'              => $this->name,
			'slug'              => $this->slug,
			'meta_title'        => $this->meta_title,
			'meta_description'  => $this->meta_description,
			'icon'              => asset( $this->uploadDirectory . $this->icon ),
			'hover_icon'        => asset( $this->uploadDirectory . $this->hover_icon ),
			'tooltip_title'     => $this->tooltip_title,
			'tooltip'           => $this->tooltip,
			'template'          => $this->template,
			'show_landing_page' => $this->show_landing_page,
			'is_active'         => $this->is_active,
			'businessOptions'   => $this->businessOptionsIdentifierData(),
		];
	}
}
