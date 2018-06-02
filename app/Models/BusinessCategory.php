<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    public $uploadDirectory = 'images/business-categories/';
    protected $fillable = ['name', 'icon', 'hover_icon', 'tooltip'];
    protected $returnFields = ['id', 'name', 'icon', 'hover_icon', 'tooltip'];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    public function businessOptions()
    {
        return $this->belongsToMany(BusinessOption::class);
    }

    /**
     * Get active business categories
     *
     * @return mixed
     */
    public function getActive()
    {
        return $this->get($this->returnFields);
    }
}
