<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $username = $request->query('user');
        $user = User::where('name', $username)->first();
        $currentUser = Auth::user();
        if (empty($username) || !$user) {
            $teams = Team::all();
        }
        else {
            if ($currentUser->is_admin) {
                $teams = Team::where('user_id', $user->id)->withTrashed()->get();
            }
            else {
                $teams = Team::where('user_id', $user->id)->get();
            }
        }

        return view('teams.index', compact('teams', 'currentUser'));
    }

    public function show(int $id): View
    {
        $currentUser = Auth::user();
        if ($currentUser->is_admin) {
            $team = Team::withTrashed()->findOrFail($id);
        }
        else {
            $team = Team::findOrFail($id);
        }
        $games = $team->allGames();
        $otherTeams = Team::where('id', '!=', $team->id)->get();
        return view('teams.show', compact('team', 'currentUser', 'games', 'otherTeams'));
    }

    public function create(): View
    {
        $currentUser = Auth::user();
        return view('teams.create', compact('currentUser'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'original_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'summary' => 'required|string',
            'description'=> 'required|string',
            'image' => 'required|image|max:2048'
        ]);

        $team = new Team;
        $team->name = $request->input('name');
        $team->original_name = $request->input('original_name');
        $team->country = $request->input('country');
        $team->summary = $request->input('summary');
        $team->description = $request->input('description');
        $team->logo = $request->file('image');
        $team->user_id = Auth::user()->getAuthIdentifier();

        $team->save();

        return redirect()->route('teams.index');
    }

    public function edit(int $id): View
    {
        $currentUser = Auth::user();
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team', 'currentUser'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $team = Team::findOrFail($id);
        $this->authorize('update-team', $team);

        $request->validate([
            'name' => 'required|string|max:255',
            'original_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'summary' => 'required|string',
            'description'=> 'required|string',
            'image' => 'image|max:2048'
        ]);

        $team->update($request->all());

        if ($request->file('image')) {
            $team->logo = $request->file('image');
            $team->save();
        }

        return redirect()->route('teams.show', ['id' => $team->id]);
    }

    public function destroy(int $id): RedirectResponse
    {
        $team = Team::findOrFail($id);
        $this->authorize('delete-team', $team);

        $team->delete();

        return redirect()->route('teams.index');
    }

    public function restore(int $id)
    {
        $team = Team::onlyTrashed()->findOrFail($id);
        $this->authorize('restore-team', $team);

        $team->restore();
        return redirect()->route('teams.show', ['id' => $id]);
    }

    public function delete(int $id)
    {
        $team = Team::onlyTrashed()->findOrFail($id);
        $this->authorize('force-delete-team', $team);

        $team->forceDelete();
        return redirect()->route('teams.index');
    }

    public function restShow(Request $request)
    {
        $teams = Team::all();
        return response()->json($teams);
    }
}
