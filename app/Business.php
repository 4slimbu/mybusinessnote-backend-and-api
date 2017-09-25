<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function path(){

        return "/business/". $this->id;
    }
}
