<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    public static function messages($room_id): JsonResponse
    {
        $room = Room::query()->where('id', $room_id)->first();
        $messages = Message::query()->where('room_id', $room_id)->with('author')->get();
        return response()->json([
            'room' => $room,
            'messages' => $messages
        ]);
    }

    public static function sendMessage()
    {
        $message = Message::query()->create([
            'message' => request('message'),
            'user_id' => session('user'),
            'room_id' => request('room_id'),
            'timestamp' => time()
        ]);
        $user = User::query()->where('id', session('user'))->first();
        return event(new SendMessage($user['name'], $message['message'], $message['room_id']));
    }
}
