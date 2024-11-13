<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function show(int $id)
    {
        $team = Team::findOrFail($id);
        return view('teams.show', compact('team'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
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

        $team->save();

        return redirect()->route('teams.index');
    }

    public function edit(int $id)
    {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, int $id)
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

    public function destroy(int $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.index');
    }
}
