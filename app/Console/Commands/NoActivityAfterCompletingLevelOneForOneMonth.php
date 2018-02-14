<?php

namespace App\Console\Commands;

use App\Events\NoActivityAfterCompletingLevelOneForOneMonthEvent;
use App\Models\Business;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NoActivityAfterCompletingLevelOneForOneMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendEmail:noActivityAfterCompletingLevelOneForOneMonth';

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
        /*
         * When user proceed in the business option funnel, the tracker tables business_level and business_section are
         * populated with related information and the updated_at property. So, here what we are doing is we are selecting
         * businesses which has at least one section of level 2 completed a month ago. It obviously means he has completed
         * level one more than a month ago and is at level 2 for more than a month.
         */
        $businesses = Business::leftJoin('business_level', 'businesses.id', '=', 'business_level.business_id')
            ->leftJoin('business_section', 'businesses.id', '=', 'business_section.business_id')
            ->leftJoin('email_notification_tracker', 'businesses.id', '=', 'email_notification_tracker.business_id')
            ->select('businesses.id', 'businesses.user_id', 'business_section.updated_at')
            ->where('business_level.level_id', 2)
            ->where('business_section.updated_at', '<', Carbon::now()->subMonth(1))
            ->where('email_notification_tracker.no_activity_after_completing_level_one_for_one_month', 0)
            ->groupBy('businesses.id')
            ->get();

        $businesses->load('user');

        foreach ($businesses as $business) {
            event(new NoActivityAfterCompletingLevelOneForOneMonthEvent($business->user));

            // update email sent count
            $business->emailNotificationTracker->fill([
                'no_activity_after_completing_level_one_for_one_month' => 1
            ])->save();
        }

    }
}
