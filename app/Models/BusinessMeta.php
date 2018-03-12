<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessMeta extends Model
{
    public $uploadDirectory = 'images/business-options/';
    protected $fillable = [
        'business_id',
        'business_option_id',
        'key',
        'value',
    ];
}
