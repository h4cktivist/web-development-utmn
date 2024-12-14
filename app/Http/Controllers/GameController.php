<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function store(Request $request, Team $team)
    {
        $request->validate([
            'away_team_id' => 'required|exists:teams,id|different:team.id',
            'match_date' => 'required|date',
            'stadium_name' => 'required',
        ]);

        Game::create([
            'home_team_id' => $team->id,
            'away_team_id' => $request->away_team_id,
            'match_date' => $request->match_date,
            'stadium_name' => $request->stadium_name,
            'user_id' => Auth::user()->getAuthIdentifier(),
        ]);

        return redirect()->back();
    }
}
