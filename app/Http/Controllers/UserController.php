<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        // get all users except the authenticated one
        $users = User::where('id', '!=', auth()->id())->get();

        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('is_read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $users = $users->map(function($user) use ($unreadIds) {
            $userUnread = $unreadIds->where('sender_id', $user->id)->first();

            $user->unread = $userUnread ? $userUnread->messages_count : 0;

            return $user;
        });
        return view('home', compact('users'));
    }
}
