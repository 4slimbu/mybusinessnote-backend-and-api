<?php

namespace App\Listeners;

use App\Libraries\CampaignMonitorLibrary;

class SendLevelTwoNotCompleteAfterOneWeekReminderEmail
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
        $campaignMonitor->sendLevelTwoNotCompleteAfterOneWeekReminderEmail($event->user);
    }
}
