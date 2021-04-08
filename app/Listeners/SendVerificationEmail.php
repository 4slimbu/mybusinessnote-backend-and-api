<?php

namespace App\Listeners;

use App\Events\UnVerifiedUserEvent;
use App\Libraries\CampaignMonitorLibrary;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerificationEmail implements ShouldQueue
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
     * @param UnVerifiedUserEvent $event
     * @return void
     */
    public function handle(UnVerifiedUserEvent $event)
    {
        $campaignMonitor = new CampaignMonitorLibrary($event->user);
        $campaignMonitor->sendVerificationEmail();
    }
}
