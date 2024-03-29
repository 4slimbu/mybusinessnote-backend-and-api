<?php

namespace App\Listeners;

use App\Jobs\UpdateBusinessesNeedRefreshStatus;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LevelCreatedListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
	    UpdateBusinessesNeedRefreshStatus::dispatch(true);
    }
}
