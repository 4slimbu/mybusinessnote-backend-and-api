<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ThirdPartyIntegration extends Model
{
    protected $guarded = [

    ];

    public function partner()
	{
		return $this->hasMany(ThirdPartyPartner::class);
	}

	public function category()
	{
		return $this->hasMany(ThirdPartyBusinessCategory::class);
	}

	    public function parent()
	{
		return $this->hasOne(ThirdPartyIntegration::class);
	}

}
