<?php

use Illuminate\Support\Facades\Broadcast;

// Broadcasting all office movements with blobs
Broadcast::channel('office', function() {
    return true;
});

Broadcast::channel('chat.{room_id}', function () {
    return true;
});
