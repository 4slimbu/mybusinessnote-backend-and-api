<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function path(){

        return "/business/". $this->id;
    }

        public function businessCategory()
{
    return $this->belongsTo(BusinessCategory::class);

}

public function badge()
{
    return $this->belongsTo(Badge::class);

}

public function role()
{
    return $this->belongsTo(Role::class);

}

public function user()
{
    return $this->belongsTo(User::class);

}

}
