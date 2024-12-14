<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $currentUser = Auth::user();
        if (!$currentUser->is_admin)
            abort(403, 'Unauthorized');

        $users = User::all();

        return view('admin.index', compact('users'));
    }
}
