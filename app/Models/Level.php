<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $uploadDirectory = 'images/levels/';
    protected $fillable = ['name', 'slug', 'icon', 'badge_icon', 'badge_message', 'content', 'tooltip_title', 'tooltip', 'template', 'is_active', 'is_down', 'down_message'];

    //Each level can have multiple sections

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function businesses()
    {
        return $this->belongsToMany(Business::class)->withPivot("completed_percent");
    }

    public function sectionsIdentifierData()
    {
        return $this->sections()->get(['id', 'name', 'slug']);
    }
}
