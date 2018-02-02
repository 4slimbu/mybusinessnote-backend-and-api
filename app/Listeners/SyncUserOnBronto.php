<?php

namespace App\Listeners;

use App\Events\BrontoSubscriptionUpdated;
use App\Events\UserSubscriptionUpdated;
use App\Libraries\BrontoLibrary;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SoapClient;
use SoapHeader;

class SyncUserOnBronto
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
     * @param BrontoSubscriptionUpdated $event
     * @return void
     */
    public function handle(BrontoSubscriptionUpdated $event)
    {
        $bronto = new BrontoLibrary($event->user);
        $bronto->syncCurrentUser();
    }
}
