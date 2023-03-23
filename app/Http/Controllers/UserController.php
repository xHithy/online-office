<?php

namespace App\Http\Controllers;

use App\Events\CreateBlob;
use App\Events\JoinChat;
use App\Events\LeaveChat;
use App\Events\MoveBlob;
use App\Events\RemoveBlob;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserController extends Controller
{
    public static function index(): RedirectResponse|View
    {
        if(session('user')) {
            return redirect(route('office'));
        } else {
            return view('landing');
        }
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
            'room_id' => 1,
            'avatar_id' => request('avatar'),
            'posX' => 0,
            'posY' => 0
        ]);

        // Increment user count by one in the default room
        $room = Room::query()->where('id', '=', 1)->first();
        Room::query()->where('id', '=', 1)->update([
            'users_in' => $room['users_in'] + 1
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
        $pos_x = request('posX');
        $pos_y = request('posY');
        $room_id = request('room');

        $pre_update_user = User::query()->where('id', session('user'))->first();
        $old_room = Room::query()->where('id', $pre_update_user['room_id'])->first();
        $new_room = Room::query()->where('id', $room_id)->first();

        User::query()->where('id', session('user'))->update([
            'posX' => $pos_x,
            'posY' => $pos_y,
            'room_id' => $room_id
        ]);

        if($room_id == $old_room['id']) {
            event(new MoveBlob($pos_x, $pos_y, session('user'), $room_id));
            return 0;
        }

        // If the old room user count is zero, then delete all the messages for the channel
        if($old_room['users_in'] - 1 <= 0) {
            Message::query()->where('room_id', $old_room['id'])->delete();
        }

        // Increment user count by one to the room that user just joined
        Room::query()->where('id', $room_id)->update([
           'users_in' => $new_room['users_in'] + 1
        ]);

        // Decrement user count by one to the room the user just left
        Room::query()->where('id', $old_room['id'])->update([
           'users_in' => $old_room['users_in'] - 1
        ]);

        event(new LeaveChat($pre_update_user['name'], $old_room['id']));
        event(new JoinChat($pre_update_user['name'], $room_id));
        event(new MoveBlob($pos_x, $pos_y, session('user'), $room_id));
    }

    public static function locations(): JsonResponse
    {
        return response()->json([
            'colleagues' => User::query()->where('id', '!=', session('user'))->get(),
            'user' => User::query()->where('id', session('user'))->first(),
        ]);
    }
}
