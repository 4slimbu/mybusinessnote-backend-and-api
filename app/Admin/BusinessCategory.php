<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $fillable = ['title', 'tooltip'];
    public $timestamps = false;
}