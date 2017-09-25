<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = ['name', 'message', 'icon'];

    public $timestamps = false;
}
