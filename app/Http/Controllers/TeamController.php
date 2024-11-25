<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->query('user');
        if (empty($userId)) {
            $user = Auth::user();
            $teams = $user->teams()->get();
        }
        else {
            $teams = Team::where('user_id', $userId)->get();
        }

        return view('teams.index', compact('teams'));
    }

    public function show(int $id): View
    {
        $team = Team::findOrFail($id);
        return view('teams.show', compact('team'));
    }

    public function create(): View
    {
        return view('teams.create');
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
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'original_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'summary' => 'required|string',
            'description'=> 'required|string',
            'image' => 'image|max:2048'
        ]);

        $team = Team::findOrFail($id);
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
        $team->delete();

        return redirect()->route('teams.index');
    }
}
