<?php

namespace App\Console\Commands;

use App\Events\LevelOneNotCompleteAfterOneDayEvent;
use App\Models\Business;
use Carbon\Carbon;
use Illuminate\Console\Command;

class LevelOneNotCompleteAfterOneDayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendEmail:levelOneNotCompleteAfterOneDay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
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
        $businesses = Business::leftJoin('business_level', 'businesses.id', '=', 'business_level.business_id')
            ->leftJoin('email_notification_tracker', 'businesses.id', '=', 'email_notification_tracker.business_id')
            ->select('businesses.id', 'businesses.user_id', 'business_level.completed_percent')
            ->where('business_level.level_id', 1)
            ->where('business_level.completed_percent', '<', 100)
            ->where('businesses.created_at', '<', Carbon::now()->subDay(1))
            ->where('email_notification_tracker.level_one_not_complete_after_one_day', 0)
            ->get();

        foreach ($businesses as $business) {
            event(new LevelOneNotCompleteAfterOneDayEvent($business->user));

            // update email sent count
            $business->emailNotificationTracker->fill([
                'level_one_not_complete_after_one_day' => 1
            ])->save();
        }

    }
}
