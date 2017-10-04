<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = ['name', 'message', 'icon'];

    public $timestamps = false;

    public function businesses()
    {
    	return $this->hasMany(Business::class);
    }
}