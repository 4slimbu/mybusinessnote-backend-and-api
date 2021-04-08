<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LeadGenerateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * This is the current user instance
     * @var User
     */
    public $user;

	/**
	 * This is the partner for whom lead is generated
	 * @var User
	 */
	public $partner;

	/**
	 * Create a new event instance.
	 *
	 * @param User $user
	 * @param User $partner
	 */
    public function __construct(User $user, User $partner)
    {
        $this->user = $user;
        $this->partner = $partner;
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
