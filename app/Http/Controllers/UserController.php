<?php

namespace App\Http\Controllers;

use App\Events\CreateBlob;
use App\Events\MoveBlob;
use App\Events\RemoveBlob;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserController extends Controller
{
    public static function index(): View
    {
        return view('landing');
    }

    public static function login(): RedirectResponse
    {
        $validation = Validator::make(request()->all(), [
           'name' => 'required|unique:users|min:2|max:20',
           'avatar' => 'required|integer'
        ]);

        if($validation->fails()) {
            return back()->withInput()->withErrors($validation->messages());
        }

        $user = User::query()->create([
            'name' => request('name'),
            'avatar_id' => request('avatar'),
            'posX' => 0,
            'posY' => 0
        ]);

        event(new CreateBlob($user['id'], $user['avatar_id'], $user['name']));

        // Set user ID as session variable so it can be used for validation/authentication
        session(['user' => $user['id']]);

        return redirect(route('office'));
    }

    public static function logout(): RedirectResponse
    {
        // Delete the user from the database
        User::query()->where('id', session('user'))->delete();

        event(new RemoveBlob(session('user')));

        // Remove the verification session
        session()->forget('user');

        return redirect(route('landing'));
    }

    public static function move()
    {
        User::query()->where('id', session('user'))->update([
            'posX' => request('posX'),
            'posY' => request('posY'),
            'room_id' => request('room')
        ]);

        $user = User::query()->where('id', session('user'))->first();

        event(new MoveBlob($user['posX'], $user['posY'], session('user')));
    }

    public static function locations(): JsonResponse
    {
        return response()->json([
            'colleagues' => User::query()->where('id', '!=', session('user'))->get(),
            'user' => User::query()->where('id', session('user'))->first(),
        ]);
    }
}
