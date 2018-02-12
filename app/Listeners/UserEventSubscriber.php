<?php

namespace App\Listeners;

use App\Events\BrontoSubscriptionUpdated;
use App\Events\CampaignMonitorSubscriptionUpdated;
use App\Events\UnVerifiedUserEvent;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessOption;
use App\Traits\Authenticable;
use App\Traits\BusinessOptionable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserEventSubscriber
{
    use Authenticable, BusinessOptionable;
    /**
     * Handle user register events.
     * @param $event
     */
    public function onUserRegister($event) {
        $request = app('request');
        //create business with business_category_id, user_id and sell_goods
        $business_category_id = $request->get('business_category_id') ? $request->get('business_category_id') : 1;
        $business = Business::create([
            'user_id' => $event->user->id,
            'business_category_id' => $business_category_id,
            'sell_goods' => $request->get('sell_goods') ? $request->get('sell_goods') : false
        ]);

        // Set up business_business_options with all the available business_options
        $relevant_business_options = BusinessCategory::find($business_category_id)->businessOptions()
            ->where('business_category_id', $business_category_id)->pluck('id');
        $business->businessOptions()->attach($relevant_business_options);

        //sync business with default business options determined by business_category_id
        $data = [
            'business_category_id' => $business_category_id,
            'business_option_status' => 'done'
        ];
        // Sync business_category business option
        $this->syncBusinessPivotTables($business, BusinessOption::find(1), $data);
        // Sync sell_goods business Option
        if ($business_category_id != 4) {
            $this->syncBusinessPivotTables($business, BusinessOption::find(2), $data);
        }
        // Sync about you business option
        $this->syncBusinessPivotTables($business, BusinessOption::find(3), $data);

//        event(new BrontoSubscriptionUpdated($event->user));
//        event(new CampaignMonitorSubscriptionUpdated($event->user));
//        event(new UnVerifiedUserEvent($event->user));
    }

    /**
     * Handle user update events.
     * @param $event
     */
    public function onUserUpdate($event) {
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
