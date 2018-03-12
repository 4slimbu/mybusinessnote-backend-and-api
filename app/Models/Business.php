<?php

namespace App\Models;

use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use Authenticable, BusinessOptionable;

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
        return $this->belongsToMany(Level::class)->withPivot("completed_percent", "updated_at");
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class)->withPivot("completed_percent", "updated_at");
    }

    public function businessOptions()
    {
        return $this->belongsToMany(BusinessOption::class)->withPivot("status", "updated_at");
    }

    public function businessMetas()
    {
        return $this->hasMany(BusinessMeta::class);
    }

    public function emailNotificationTracker()
    {
        return $this->hasOne(EmailNotificationTracker::class);
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }

    //TODO: move this to repository
    public function setUp(User $user)
    {
        $request = app('request');

        //create business with business_category_id, user_id and sell_goods
        $business_category_id = $request->get('business_category_id') ? $request->get('business_category_id') : 1;
        $business = Business::create([
            'user_id'              => $user->id,
            'business_category_id' => $business_category_id,
            'sell_goods'           => $request->get('sell_goods') ? $request->get('sell_goods') : false,
        ]);

        // Set up business_business_options with all the available business_options
        $this->refreshBusinessBusinessOption($business);

        //sync business with default business options determined by business_category_id
        $data = [
            'business_category_id'   => $business_category_id,
            'business_option_status' => 'done',
        ];
        // Sync business_category business option
        $this->syncBusinessPivotTables($business, BusinessOption::find(1), $data);
        // Sync sell_goods business Option
        if ($business_category_id != 4) {
            $this->syncBusinessPivotTables($business, BusinessOption::find(2), $data);
        }
        // Sync about you business option
        $this->syncBusinessPivotTables($business, BusinessOption::find(3), $data);
    }
}
