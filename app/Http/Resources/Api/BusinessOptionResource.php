<?php

namespace App\Http\Resources\Api;

use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Http\Resources\Json\Resource;

class BusinessOptionResource extends Resource {
	use Authenticable, BusinessOptionable;

	public function __construct( $resource, $data = null ) {
		parent::__construct( $resource );
	}

	/**
	 * Transform the resource into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	public function toArray( $request ) {
		$returnData = [
			'id'             => $this->id,
			'level_id'       => $this->level_id,
			'section_id'     => $this->section_id,
			'parent_id'     => $this->parent_id,
			'name'           => $this->name,
			'short_name'           => $this->short_name,
			'slug'           => $this->slug,
			'icon'           => asset( $this->uploadDirectory . $this->icon ),
			'hover_icon'     => asset( $this->uploadDirectory . $this->icon ),
			'content'        => $this->content,
			'element'        => $this->element,
			'element_data'   => $this->element_data,
			'tooltip_title'  => $this->tooltip_title,
			'tooltip'        => $this->tooltip,
			'menu_order'     => $this->menu_order,
			'weight'         => $this->weight,
			'template'       => $this->template,
			'is_active'      => $this->is_active,
//            'status'         => $this->getStatus(),
			'affiliateLinks' => new AffiliateLinkResourceCollection( $this->affiliateLinks ),
			'children'       => $this->childrenIdentifierData(),
		];


		if ( $this->getAuthUser() ) {
			$returnData['businessMetas'] = new BusinessMetaResourceCollection( $this->currentUserBusinessMetas() );
		}

		return $returnData;
	}

}
