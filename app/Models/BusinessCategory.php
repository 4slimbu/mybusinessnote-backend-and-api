<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $fillable = ['name', 'icon', 'tooltip'];

    public function businesses()
    {
    	return $this->hasMany(Business::class);
    }

    public function businessOptions()
    {
        return $this->belongsToMany(BusinessOption::class);
    }
}
