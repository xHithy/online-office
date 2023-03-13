<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;

class RouteController extends Controller
{
    public static function landing(): View
    {
        return view('landing');
    }

    public static function office(): View
    {
        return view('office');
    }
}
