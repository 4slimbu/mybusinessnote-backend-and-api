<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $fillable = ['title', 'tooltip'];
    public $timestamps = false;

    public function businesses()
    {
    	return $this->hasMany(Business::class);
    }
}
