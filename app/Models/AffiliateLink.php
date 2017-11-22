<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateLink extends Model
{
    public function partner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
