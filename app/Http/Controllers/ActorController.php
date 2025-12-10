<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    // 🔹 LISTA DE ACTORES
    public function index()
    {
        $actors = Actor::all();
        return view('actors.index', compact('actors'));
    }

    // 🔹 FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('actors.create');
    }

    // 🔹 GUARDAR NUEVO ACTOR
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
        ]);

        Actor::create($request->all());

        return redirect()->route('actors.index')
            ->with('success', 'Actor creado correctamente');
    }

    // 🔹 MOSTRAR UN ACTOR
    public function show($id)
    {
        $actor = Actor::findOrFail($id);
        return view('actors.show', compact('actor'));
    }

    // 🔹 FORMULARIO DE EDICIÓN
    public function edit($id)
    {
        $actor = Actor::findOrFail($id);
        return view('actors.edit', compact('actor'));
    }

    // 🔹 ACTUALIZAR ACTOR
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
        ]);

        $actor = Actor::findOrFail($id);
        $actor->update($request->all());

        return redirect()->route('actors.index')
            ->with('success', 'Actor actualizado correctamente');
    }

    // 🔹 ELIMINAR ACTOR
    public function destroy($id)
    {
        $actor = Actor::findOrFail($id);
        $actor->delete();

        return redirect()->route('actors.index')
            ->with('success', 'Actor eliminado correctamente');
    }
}
