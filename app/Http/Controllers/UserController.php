<?php

namespace App\Http\Controllers;

use App\Events\FriendshipEstablished;
use App\Models\User;
use App\Models\Friendship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $currentUser = Auth::user();
        return view('users.show', compact('currentUser'));
    }
    public function addFriend(User $user)
    {
        Auth::user()->addFriend($user);
        $user->addFriend(Auth::user());
        return redirect()->back();
    }

    public function removeFriend(User $user)
    {
        Auth::user()->removeFriend($user);
        $user->removeFriend(Auth::user());
        return redirect()->back();
    }

    public function generateToken(Request $request) {
        $user = $request->user();
        if ($user) {
            $tokenResult = $user->createToken('app');
            $token = $tokenResult->accessToken;
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
