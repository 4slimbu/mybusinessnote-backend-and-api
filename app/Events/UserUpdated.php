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

class UserUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * This is the user instance before update is carried out
     * @var User
     */
    public $oldUser;

    /**
     * This is the user instance after update is carried out
     * @var User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param User $oldUser
     * @param User $user
     */
    public function __construct(User $oldUser, User $user)
    {
        $this->oldUser = $oldUser;
        $this->user = $user;
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
