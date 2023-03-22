<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RoomController extends Controller
{
    public static function index(): View
    {
        $user = User::query()->where('id', session('user'))->first();
        return view('office', [
            'rooms' => Room::query()->get(),
            'name' => $user['name'],
            'avatar_id' => $user['avatar_id']
        ]);
    }

    public static function status(): JsonResponse
    {
        return response()->json(Room::query()->with('users')->get());
    }
}
