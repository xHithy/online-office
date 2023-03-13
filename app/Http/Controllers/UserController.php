<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public static function index(): View
    {
        return view('landing');
    }
}
