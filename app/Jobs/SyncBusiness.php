<?php

namespace App\Jobs;

use App\Models\Business;
use App\Traits\BusinessOptionable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncBusiness implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, BusinessOptionable;

	/**
	 * Business to sync
	 *
	 * @var
	 */
    protected $business;

	/**
	 * Create a new job instance.
	 *
	 * @param Business $business
	 */
    public function __construct(Business $business)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->refreshBusiness($this->business);
    }
}
