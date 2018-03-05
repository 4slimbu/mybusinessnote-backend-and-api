<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $fillable = ['name', 'icon', 'hover_icon', 'tooltip'];

    public $uploadDirectory = 'images/business-categories/';

    public function businesses()
    {
    	return $this->hasMany(Business::class);
    }

    public function businessOptions()
    {
        return $this->belongsToMany(BusinessOption::class);
    }
}
