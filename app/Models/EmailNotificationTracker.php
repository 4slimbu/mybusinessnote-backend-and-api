<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailNotificationTracker extends Model
{
    protected $table = 'email_notification_tracker';

    protected $fillable = [
        'business_id',
        'level_one_complete',
        'level_one_not_complete_after_one_day',
        'level_two_not_complete_after_one_week'
    ];
}
