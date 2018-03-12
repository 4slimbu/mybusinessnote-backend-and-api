<?php

namespace App\Listeners;

use App\Libraries\CampaignMonitorLibrary;

class SendLevelOneNotCompleteAfterOneDayReminderEmail
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
     * @param  object $event
     * @return void
     */
    public function handle($event)
    {
        $campaignMonitor = new CampaignMonitorLibrary($event->user);
        $campaignMonitor->sendLevelOneNotCompleteAfterOneDayReminderEmail($event->user);
    }
}
