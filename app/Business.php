<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function path(){

        return "/business/". $this->id;
    }

    public function businessCategory()
{
	return $this->belongsTo(Admin\BusinessCategory::class);

}

public function badge()
{
	return $this->belongsTo(Admin\Badge::class);

}

public function role()
{
	return $this->belongsTo(Admin\Role::class);

}

public function user()
{
	return $this->belongsTo(User::class);

}
    
}
