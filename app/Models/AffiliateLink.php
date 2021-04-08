<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateLink extends Model
{
	protected $fillable = [ 'name', 'description', 'link', 'user_id'];

    public function partner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
