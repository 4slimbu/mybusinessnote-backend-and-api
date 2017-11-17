<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'role_id',
        'email',
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
        'password',
        'verified',
        'token',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Update verified user status.
     *
     *
     */
    public function verified()
    {
        $this->verified = 1;
        $this->token = null;
        $this->save();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function businesses()
    {
        return $this->hasMany(Business::class);

    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function scopeVerified($query)
    {
        $query->where('verified', '1');
    }

    public function scopePartner($query)
    {
        $query->where('role_id', 3);
    }

    public function scopeCustomer($query)
    {
        $query->where('role_id', 2);
    }

    public function scopeAdministrator($query)
    {
        $query->where('role_id', 1);
    }
}
