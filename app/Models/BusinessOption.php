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
        'content'
    ];

    public function setParentIdAttribute($value)
    {
        $this->attributes['parent_id'] = ($value)? $value : 0;
    }

    public function parent()
    {
        return $this->belongsTo(BusinessOption::class, 'parent_id');
    }

	public function businessCategories()
	{
		return $this->belongsToMany(BusinessCategory::class);
	}

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

}
