<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ThirdPartyPartner extends Model
{

	protected $table = 'third_party_patrners';

    public function thirdPartyIntegration()
	{	
    	return $this->belongsTo(Admin\ThirdPartyIntegration::class);
	}

	public function partner()
	{
		return $this->hasOne(third_party_category::class);
	}
}
