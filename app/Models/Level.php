<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name', 'parent_id', 'description', 'content'];

    //Each level can have parent
    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    //Each level can have multiple children
    public function children() {
        return $this->hasMany(static::class, 'parent_id');
    }
}
