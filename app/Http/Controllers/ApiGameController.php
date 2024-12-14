<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiGameController extends Controller
{
    public function index(Team $team)
    {
        return GameResource::collection($team->allGames);
    }

    public function show(Game $game)
    {
        return new GameResource($game);
    }

    public function store(Request $request, Team $team)
    {
        $data = $request->validate([
            'away_team_id' => 'required|exists:teams,id|different:team.id',
            'match_date' => 'required|date',
            'stadium_name' => 'required',
        ]);

        $game = Game::create([
            'home_team_id' => $team->id,
            'away_team_id' => $request->away_team_id,
            'match_date' => $request->match_date,
            'stadium_name' => $request->stadium_name,
            'user_id' => Auth::user()->getAuthIdentifier(),
        ]);

        return new GameResource($game);
    }

    public function update(Request $request, Game $game)
    {
        $game->update($request->all());

        return new GameResource($game);
    }
}
