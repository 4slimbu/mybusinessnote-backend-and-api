<?php

namespace App\Listeners;

use App\Libraries\CampaignMonitorLibrary;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncUserDataListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $campaignMonitor = new CampaignMonitorLibrary($event->user);
        $campaignMonitor->sendLeadGenerateEmail($event->partner);
    }
}
