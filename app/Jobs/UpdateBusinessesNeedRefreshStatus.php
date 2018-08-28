<?php

namespace App\Jobs;

use App\Models\Business;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateBusinessesNeedRefreshStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	/**
	 * Need Refresh status
	 *
	 * @var bool
	 */
    protected $status;

	/**
	 * Business
	 *
	 * @var Business
	 */
    protected $business;

	/**
	 * Create a new job instance.
	 *
	 * @param bool $status
	 * @param Business $business
	 */
    public function __construct($status = false, Business $business = null)
    {
        $this->status = $status;

	    if ($business) {
	    	$this->business = $business;
	    }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
	    if ($this->business) {
	    	Business::where('id', '=', $this->business->id)->update( ['need_refresh' => $this->status]);
	    } else {
		    Business::where('id', '!=', 'null')->update( ['need_refresh' => $this->status] );
	    }
    }
}
