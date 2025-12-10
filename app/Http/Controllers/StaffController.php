<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::with(['store', 'address'])->get();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email'
        ]);

        Staff::create($request->all());

        return redirect()->route('staff.index')->with('success', 'Empleado creado correctamente');
    }

    public function show($id)
    {
        $staff = Staff::with(['store','address'])->findOrFail($id);
        return view('staff.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $staff->update($request->all());

        return redirect()->route('staff.index')->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy($id)
    {
        Staff::destroy($id);
        return redirect()->route('staff.index')->with('success', 'Empleado eliminado');
    }
}


