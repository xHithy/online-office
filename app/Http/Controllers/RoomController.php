<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RoomController extends Controller
{
    public static function index(): View
    {
        return view('office');
    }
}
