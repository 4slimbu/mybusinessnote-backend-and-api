<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $fillable = ['name', 'tooltip'];

    public function businesses()
    {
    	return $this->hasMany(Business::class);
    }
}
