<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name', 'key', 'value', 'status',
    ];

    protected $casts = [
    	'value' => 'array'
    ];
}
