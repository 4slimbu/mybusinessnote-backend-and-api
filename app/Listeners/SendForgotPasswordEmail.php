<?php

namespace App\Listeners;

use App\Events\ForgotPasswordEvent;
use App\Libraries\CampaignMonitorLibrary;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendForgotPasswordEmail implements ShouldQueue
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
     * @param ForgotPasswordEvent $event
     * @return void
     */
    public function handle(ForgotPasswordEvent $event)
    {
        $campaignMonitor = new CampaignMonitorLibrary($event->user);
        $campaignMonitor->sendForgotPasswordEmail();
    }
}
