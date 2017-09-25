<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    

    public function businesses()
{
	return $this->hasMany(Business::class);

}
}
