<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        $friendsIds = $currentUser->friends()->pluck('friend_id');
        $teams = Team::whereIn('user_id', $friendsIds)->orderBy('created_at', 'desc')->get();
        return view('friends.index', compact('teams', 'currentUser'));
    }
}
