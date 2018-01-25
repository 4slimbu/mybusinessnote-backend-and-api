<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'businesses';
    protected $fillable = [
        'user_id',
        'business_category_id',
        'business_name',
        'tagline',
        'logo',
        'website',
        'abn',
        'acn',
        'business_email',
        'business_mobile',
        'business_general_phone',
        'address',
        'sell_goods',
    ];

    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function levels()
    {
        return $this->belongsToMany(Level::class)->withPivot("completed_percent");
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class)->withPivot("completed_percent");
    }

    public function businessOptions()
    {
        return $this->belongsToMany(BusinessOption::class)->withPivot("status");
    }

    public function businessMetas()
    {
        return $this->hasMany(BusinessMeta::class);
    }
}
