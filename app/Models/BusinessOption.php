<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessOption extends Model
{
    protected $fillable = [
        'section_id',
        'parent_id',
        'name',
        'description',
        'content',
        'element',
        'tooltip',
        'show_everywhere',
        'weight'
    ];

    //each can have a parent
    public function parent()
    {
        return $this->belongsTo(BusinessOption::class, 'parent_id');
    }

    //Each can have multiple children
    public function children() {
        return $this->hasMany(BusinessOption::class, 'parent_id');
    }

	public function businessCategories()
	{
		return $this->belongsToMany(BusinessCategory::class);
	}

    public function affiliateLinks()
    {
        return $this->belongsToMany(AffiliateLink::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public static function elements()
    {
        return [
            'GettingStartedHome' => 'GettingStartedHome',
            'BusinessCategories' => 'BusinessCategories',
            'RegisterUser' => 'RegisterUser',
            'CreateBusiness' => 'CreateBusiness',
            'RegisterBusiness' => 'RegisterBusiness'
        ];
    }
}
