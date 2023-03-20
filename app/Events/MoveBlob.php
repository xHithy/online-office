<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MoveBlob implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public $pos_x, public $pos_y, public $id) {}

    public function broadcastWith(): array
    {
        return [
            $this->pos_x,
            $this->pos_y,
            $this->id
        ];
    }

    public function broadcastOn(): Channel
    {
        return new Channel('office');
    }
}
