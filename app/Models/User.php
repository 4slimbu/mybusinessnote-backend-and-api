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
    protected $guarded = [

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

    /**
     * checks if the user belongs to a particular group
     * @param string|array $role
     * @return bool
     */
    public function role($role)
    {
        $role = (array)$role;
        return in_array($this->role_id, $role);
    }

    public function businesses()
    {
        return $this->hasMany(Business::class);

    }



}
