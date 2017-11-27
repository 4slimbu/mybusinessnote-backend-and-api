<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessOption extends Model
{
    protected $fillable = [
        'level_id',
        'parent_id',
        'name',
        'description',
        'tooltip',
        'content',
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
        return $this->hasMany(static::class, 'parent_id');
    }

	public function businessCategories()
	{
		return $this->belongsToMany(BusinessCategory::class);
	}

    public function affiliateLinks()
    {
        return $this->belongsToMany(AffiliateLink::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

}
