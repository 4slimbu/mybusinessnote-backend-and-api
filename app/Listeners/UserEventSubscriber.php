<?php

namespace App\Listeners;

use App\Events\AddToEmailNotificationTrackerEvent;
use App\Events\BrontoSubscriptionUpdated;
use App\Events\CampaignMonitorSubscriptionUpdated;
use App\Events\UnVerifiedUserEvent;
use App\Models\Business;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;

class UserEventSubscriber
{
    use Authenticable, BusinessOptionable;

    /**
     * Handle user register events.
     * @param $event
     */
    public function onUserRegister($event)
    {
        (new Business)->setUp($event->user);

//        event(new BrontoSubscriptionUpdated($event->user));
//        event(new CampaignMonitorSubscriptionUpdated($event->user));
//        event(new UnVerifiedUserEvent($event->user));
//        event(new AddToEmailNotificationTrackerEvent($event->user->business));
    }

    /**
     * Handle user update events.
     * @param $event
     */
    public function onUserUpdate($event)
    {
        if ($event->oldUser->is_free_isb_subscription !== $event->user->is_free_isb_subscription) {
            event(new BrontoSubscriptionUpdated($event->user));
        }

        if ($event->oldUser->is_marketing_emails !== $event->user->is_marketing_emails) {
            event(new CampaignMonitorSubscriptionUpdated($event->user));
        }
    }

    /**
     * Register the listeners for the subscriber.
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\UserUpdated',
            'App\Listeners\UserEventSubscriber@onUserUpdate'
        );
        $events->listen(
            'App\Events\UserRegistered',
            'App\Listeners\UserEventSubscriber@onUserRegister'
        );
    }

}
