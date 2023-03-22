<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    public static function messages($room_id): JsonResponse
    {
        $room = Room::query()->where('id', $room_id)->first();
        $messages = Message::query()->where('room_id', $room_id)->get();
        return response()->json([
            'room' => $room,
            'messages' => $messages
        ]);
    }
}
