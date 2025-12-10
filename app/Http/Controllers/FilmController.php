<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::paginate(20);
        return view('films.index', compact('films'));
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'release_year' => 'nullable|integer',
        ]);

        Film::create($request->all());
        return redirect()->route('films.index')->with('success', 'Película creada');
    }

    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $film->update($request->all());
        return redirect()->route('films.index')->with('success', 'Película actualizada');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Película eliminada');
    }
}
