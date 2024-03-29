<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\BrontoSubscriptionUpdated'                         => [
            'App\Listeners\SyncUserOnBronto',
        ],
        'App\Events\CampaignMonitorSubscriptionUpdated'                => [
            'App\Listeners\SyncUserOnCampaignMonitor',
        ],
        'App\Events\UnVerifiedUserEvent'                               => [
            'App\Listeners\SendVerificationEmail',
        ],
        'App\Events\ForgotPasswordEvent'                               => [
            'App\Listeners\SendForgotPasswordEmail',
        ],
        'App\Events\CommonForgotPasswordEvent'                               => [
	        'App\Listeners\SendCommonForgotPasswordEmail',
        ],
        'App\Events\AddToEmailNotificationTrackerEvent'                => [
            'App\Listeners\AddToEmailNotificationTrackerList',
        ],
        'App\Events\LevelOneNotCompleteAfterOneDayEvent'               => [
            'App\Listeners\SendLevelOneNotCompleteAfterOneDayReminderEmail',
        ],
        'App\Events\LevelTwoNotCompleteAfterOneWeekEvent'              => [
            'App\Listeners\SendLevelTwoNotCompleteAfterOneWeekReminderEmail',
        ],
        'App\Events\LevelOneCompleteEvent'                             => [
            'App\Listeners\LevelOneCompleteListener',
        ],
        'App\Events\LevelOneNotCompleteAfterOneMonthEvent'             => [
            'App\Listeners\SendLevelOneNotCompleteAfterOneMonthReminderEmail',
        ],
        'App\Events\NoActivityAfterCompletingLevelOneForOneMonthEvent' => [
            'App\Listeners\SendNoActivityAfterCompletingLevelOneForOneMonthReminderEmail',
        ],
        'App\Events\NoActivityAfterCompletingLevelTwoForOneWeekEvent'  => [
            'App\Listeners\SendNoActivityAfterCompletingLevelTwoForOneWeekReminderEmail',
        ],
        'App\Events\NoActivityAfterCompletingLevelTwoForOneMonthEvent' => [
            'App\Listeners\SendNoActivityAfterCompletingLevelTwoForOneMonthReminderEmail',
        ],
        'App\Events\LeadGenerateEvent' => [
	        'App\Listeners\LeadGenerateListener',
        ],
        'App\Events\SyncUserData' => [
	        'App\Listeners\SyncUserDataListener',
        ],
        'App\Events\SystemChanged' => [
	        'App\Listeners\SystemChangedListener',
        ],
        'App\Events\LevelCreated' => [
	        'App\Listeners\LevelCreatedListener',
        ],
        'App\Events\LevelDeleted' => [
	        'App\Listeners\LevelDeletedListener',
        ],
        'App\Events\SectionCreated' => [
	        'App\Listeners\SectionCreatedListener',
        ],
        'App\Events\SectionDeleted' => [
	        'App\Listeners\SectionDeletedListener',
        ],
        'App\Events\BusinessOptionCreated' => [
	        'App\Listeners\BusinessOptionCreatedListener',
        ],
        'App\Events\BusinessOptionDeleted' => [
	        'App\Listeners\BusinessOptionDeletedListener',
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'App\Listeners\UserEventSubscriber',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
