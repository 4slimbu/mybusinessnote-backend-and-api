<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $uploadDirectory = 'images/sections/';
    protected $fillable = ['name', 'slug', 'level_id', 'icon', 'hover_icon', 'tooltip_title', 'tooltip', 'show_landing_page', 'template', 'is_active'];

    //Each section belong to a level

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    //Each section has many business options
    public function businessOptions()
    {
        return $this->hasMany(BusinessOption::class);
    }

    public function businessOptionsIdentifierData()
    {
        return $this->businessOptions()->get(['id', 'name', 'slug']);
    }
}
