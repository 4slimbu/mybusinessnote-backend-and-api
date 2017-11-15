<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteConfiguration extends Model
{
    protected $fillable = [
        'config_name', 'config_key', 'config_value', 'status'
    ];
}
