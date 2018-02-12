<?php

namespace App\Events;

use App\Models\Business;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AddToEmailNotificationTrackerEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * This is the business instance
     * @var User
     */
    public $business;

    /**
     * Create a new event instance.
     * @param Business $business
     */
    public function __construct(Business $business)
    {
        $this->business = $business;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
