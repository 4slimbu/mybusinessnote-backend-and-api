<?php

namespace App\Listeners;

use App\Events\CommonForgotPasswordEvent;
use App\Libraries\CampaignMonitorLibrary;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCommonForgotPasswordEmail implements ShouldQueue
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
	 * @param CommonForgotPasswordEvent $event
	 *
	 * @return void
	 */
    public function handle(CommonForgotPasswordEvent $event)
    {
        $campaignMonitor = new CampaignMonitorLibrary($event->user);
        $campaignMonitor->sendCommonForgotPasswordEmail();
    }
}
