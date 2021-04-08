<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company',
        'billing_street1',
        'billing_street2',
        'billing_postcode',
        'billing_state',
        'billing_suburb',
        'billing_country',
        'residential_street1',
        'residential_street2',
        'residential_postcode',
        'residential_state',
        'residential_suburb',
        'residential_country',
        'website',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
