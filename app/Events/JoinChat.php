<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JoinChat implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public $username, public $room_id) {}

    public function broadcastWith(): array
    {
        return [
            $this->username,
            $this->room_id
        ];
    }

    public function broadcastOn(): Channel
    {
        return new Channel('chat.'.$this->room_id);
    }
}
