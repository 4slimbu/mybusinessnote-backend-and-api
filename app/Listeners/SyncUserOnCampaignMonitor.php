<?php

namespace App\Listeners;

use App\Events\CampaignMonitorSubscriptionUpdated;
use App\Events\UserSubscriptionUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncUserOnCampaignMonitor
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
     * @param CampaignMonitorSubscriptionUpdated|UserSubscriptionUpdated $event
     * @return void
     */
    public function handle(CampaignMonitorSubscriptionUpdated $event)
    {

    }
}
