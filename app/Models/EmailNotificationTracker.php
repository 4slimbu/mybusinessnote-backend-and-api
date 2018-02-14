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
        'level_one_not_complete_after_one_month',
        'level_two_not_complete_after_one_week',
        'no_activity_after_completing_level_one_for_one_month',
        'no_activity_after_completing_level_two_for_one_week',
        'no_activity_after_completing_level_two_for_one_month'
    ];
}
