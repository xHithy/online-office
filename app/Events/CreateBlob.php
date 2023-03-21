<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateBlob implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public $user_id, public $avatar_id, public $username) {}

    public function broadcastWith(): array
    {
        return [
            $this->user_id,
            $this->avatar_id,
            $this->username
        ];
    }

    public function broadcastOn(): Channel
    {
        return new Channel('office');
    }
}
