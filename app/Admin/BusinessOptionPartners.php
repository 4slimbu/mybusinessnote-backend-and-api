<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class BusinessOptionPartners extends Model
{
    protected $fillable = ['business_option_id','partner_id'];
    protected $table = 'business_options_partners';
}
