<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'slug', 'level_id', 'icon', 'tooltip'];

    //Each section belong to a level
    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
