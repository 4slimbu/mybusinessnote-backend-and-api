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
	 * Create a new job instance.
	 *
	 * @param bool $status
	 */
    public function __construct($status = false)
    {
        $this->status = $status;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
	    Business::where('id', '!=', 'null')->update( ['need_refresh' => $this->status] );
    }
}
