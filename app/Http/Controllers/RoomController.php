<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;

class RoomController extends Controller
{
    public static function index(): View
    {
        return view('office', [
            'rooms' => Room::query()->get()
        ]);
    }
}
