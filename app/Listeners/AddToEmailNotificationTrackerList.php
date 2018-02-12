<?php

namespace App\Listeners;

use App\Models\EmailNotificationTracker;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddToEmailNotificationTrackerList
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try {
            EmailNotificationTracker::create([
                'business_id' => $event->business->id
            ]);
        } catch (\Exception $exception) {
//            dd($exception);
        }

    }
}
