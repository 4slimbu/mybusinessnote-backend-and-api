<?php

namespace App\Listeners;

use App\Libraries\CampaignMonitorLibrary;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SystemChangedListener
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
	 * @return void
	 * @internal param object $event
	 */
    public function handle()
    {
	    User::all()->update( 'need_update', 1 );
    }
}
