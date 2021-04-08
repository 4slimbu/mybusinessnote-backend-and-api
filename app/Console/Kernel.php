<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sendEmail:levelOneNotCompleteAfterOneDay')->hourly();
        $schedule->command('sendEmail:levelOneNotCompleteAfterOneMonth')->daily();
        $schedule->command('sendEmail:levelTwoNotCompleteAfterOneWeek')->daily();
        $schedule->command('sendEmail:noActivityAfterCompletingLevelOneForOneMonth')->daily();
        $schedule->command('sendEmail:noActivityAfterCompletingLevelTwoForOneWeek')->daily();
        $schedule->command('sendEmail:noActivityAfterCompletingLevelTwoForOneMonth')->daily();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
