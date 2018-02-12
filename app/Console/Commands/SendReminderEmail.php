<?php

namespace App\Console\Commands;

use App\Models\Business;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminderEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $Business = Business::where('created_at', '>', Carbon::now()->subDay(1))
            ->where('is_sent_level_one_complete_email', 0)
            ->whereHas('')
            ->get();
        dd($Business);
    }
}
