<?php

namespace App\Events;

use App\Models\ToDoTask;
use App\Models\UserLog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ToDoDeletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userLog;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ToDoTask $userLog)
    {
        $this->userLog = $userLog;
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
