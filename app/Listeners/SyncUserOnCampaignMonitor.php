<?php

namespace App\Listeners;

use App\Events\CampaignMonitorSubscriptionUpdated;
use App\Events\UserSubscriptionUpdated;
use App\Libraries\CampaignMonitorLibrary;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncUserOnCampaignMonitor implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CampaignMonitorSubscriptionUpdated $event
     * @return void
     */
    public function handle(CampaignMonitorSubscriptionUpdated $event)
    {
        $campaignMonitor = new CampaignMonitorLibrary($event->user);
        $campaignMonitor->syncCurrentUser();
    }
}
