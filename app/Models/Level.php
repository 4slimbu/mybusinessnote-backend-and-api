<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'content', 'tooltip'];

    //Each level can have multiple sections
    public function sections() {
        return $this->hasMany(Section::class);
    }
}
