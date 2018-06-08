<?php

namespace App\Models;

use App\Traits\Authenticable;
use Illuminate\Database\Eloquent\Model;

class BusinessOption extends Model {
	use Authenticable;

	public $uploadDirectory = 'images/business-options/';
	protected $fillable = [
		'level_id',
		'section_id',
		'parent_id',
		'name',
		'short_name',
		'slug',
		'icon',
		'hover_icon',
		'content',
		'element',
		'element_data',
		'tooltip_title',
		'tooltip',
		'menu_order',
		'weight',
		'template',
		'is_active',
	];

	protected $casts = [
		'element_data' => 'array',
	];

	//each can have a parent
	public static function elements() {
		return [
			'BusinessCategories'      => 'BusinessCategories',
			'SellGoods'               => 'SellGoods',
			'RegisterUser'            => 'RegisterUser',
			'CreateBusiness'          => 'CreateBusiness',
			'RegisterBusiness'        => 'RegisterBusiness',
			'SingleImageFiled'        => 'SingleTextField',
			'SingleTextField'         => 'SingleTextField',
			'BrandColor'              => 'BrandColor',
			'SocialMediaField'        => 'SocialMediaField',
			'YesAndLinkField'         => 'YesAndLinkField',
		];
	}

	//Each can have multiple children
	public function parent() {
		return $this->belongsTo( BusinessOption::class, 'parent_id' );
	}

	public function children() {
		return $this->hasMany( BusinessOption::class, 'parent_id' );
	}

	public function childrenIdentifierData() {
		return $this->children()->get( [ 'id', 'name', 'slug' ] );
	}

	public function business() {
		return $this->belongsToMany( Business::class )->withPivot( "status" );
	}

	public function businessCategories() {
		return $this->belongsToMany( BusinessCategory::class );
	}

	public function affiliateLinks() {
		return $this->belongsToMany( AffiliateLink::class )->withPivot( "label" );
	}

	public function section() {
		return $this->belongsTo( Section::class );
	}

	public function level() {
		return $this->belongsTo( Level::class );
	}

	public function businessMetas() {
		return $this->hasMany( BusinessMeta::class );
	}

	public function next() {
		if ( $currentUser = $this->getAuthUser() ) {
			$nextBusinessOption = $currentUser->business->businessOptions()
			                                            ->where( 'menu_order', '>', $this->menu_order )
			                                            ->where( 'status', '!=', 'irrelevant' )
			                                            ->first();
		} else {
			$nextBusinessOption = BusinessOption::where( 'menu_order', '>', $this->menu_order )->first();
		}

		return $nextBusinessOption;
	}

	public function previous() {
		if ( $currentUser = $this->getAuthUser() ) {
			$nextBusinessOption = $currentUser->business->businessOptions()
			                                            ->where( 'menu_order', '<', $this->menu_order )
			                                            ->where( 'status', '!=', 'irrelevant' )
			                                            ->orderBy( 'menu_order', 'desc' )
			                                            ->first();
		} else {
			$nextBusinessOption = BusinessOption::where( 'menu_order', '<', $this->menu_order )
			                                    ->orderBy( 'menu_order', 'desc' )->first();
		}

		return $nextBusinessOption;
	}

	public function getStatus() {
		if ( $currentUser = $this->getAuthUser() ) {
			if ( $relatedBusiness = $this->business()->where( 'id', $currentUser->business->id )->first() ) {
				return $relatedBusiness->pivot->status;
			}
		}

		if ( in_array( $this->id, config( 'mbj.unlocked_business_option' ) ) ) {
			return 'unlocked';
		}

		return 'locked';
	}

}
