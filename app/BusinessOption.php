<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessOption extends Model
{
    protected $guarded = [

    ];


	public function categories()
	{
		return $this->belongsToMany(BusinessCategory::class);
	}

    public function partners()
    {
        return $this->belongsToMany(User::class);
    }

}
