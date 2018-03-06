<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessMeta extends Model
{
    protected $fillable = [
        'business_id',
        'business_option_id',
        'key',
        'value'
    ];

    public $uploadDirectory = 'images/business-options/';
}
