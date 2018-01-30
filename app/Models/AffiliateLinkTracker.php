<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateLinkTracker extends Model
{
    protected $table = 'affiliate_link_tracker';
    protected $fillable = [
        'user_id',
        'affiliate_link_id',
        'business_id',
        'business_option_id',
        'browser',
        'ip'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function businessOption()
    {
        return $this->belongsTo(BusinessOption::class);
    }

    public function affiliateLink()
    {
        return $this->belongsTo(AffiliateLink::class);
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
