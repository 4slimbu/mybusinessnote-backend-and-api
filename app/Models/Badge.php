<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = ['name', 'icon', 'message'];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
