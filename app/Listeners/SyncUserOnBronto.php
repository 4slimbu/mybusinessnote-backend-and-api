<?php

namespace App\Listeners;

use App\Events\BrontoSubscriptionUpdated;
use App\Libraries\BrontoLibrary;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncUserOnBronto implements ShouldQueue
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
