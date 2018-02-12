<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name', 'slug', 'icon', 'badge_icon', 'badge_message', 'content', 'tooltip'];

    //Each level can have multiple sections
    public function sections() {
        return $this->hasMany(Section::class);
    }

    public function businesses()
    {
        return $this->belongsToMany(Business::class)->withPivot("completed_percent");
    }
}
