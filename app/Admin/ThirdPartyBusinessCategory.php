<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ThirdPartyBusinessCategory extends Model
{
    public function thirdPartyIntegration()
	{	
    	return $this->belongsTo(Admin\ThirdPartyIntegration::class);
	}

	public function businessCategory()
	{
		return $this->hasOne(BusinessCategory::class);
	}
}
