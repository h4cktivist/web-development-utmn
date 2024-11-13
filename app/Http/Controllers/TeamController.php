<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('index', compact('teams'));
    }

    public function show(string $id)
    {
        $team = Team::findOrFail($id);
        return view('show', compact('team'));
    }

    public function create()
    {
        return view('create_edit');
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

        $image = $request->file('image');
        $filename = $image->store('images', 'public');
        $team->logo = $filename;

        $team->save();

        return redirect()->route('teams.index');
    }

    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.index');
    }
}
