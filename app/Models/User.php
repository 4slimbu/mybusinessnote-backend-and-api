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
        'password', 'remember_token', 'token'
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

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function business()
    {
        return $this->hasOne(Business::class);

    }

    public function badges()
    {
        return $this->hasOne(Business::class);

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
