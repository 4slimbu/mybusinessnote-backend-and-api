<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class BusinessOptionCategory extends Model
{
    protected $fillable = ['business_option_id','business_category_id'];
    protected $table = 'business_categories_options';
}
