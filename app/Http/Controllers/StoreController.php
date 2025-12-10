<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Address;
use App\Models\Staff;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with(['manager', 'address.city.country'])->get();
        return view('stores.index', compact('stores'));
    }

    public function create()
    {
        $addresses = Address::all();
        $staff = Staff::all();
        return view('stores.create', compact('addresses', 'staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'manager_staff_id' => 'required',
            'address_id' => 'required',
        ]);

        Store::create($request->all());

        return redirect()->route('stores.index')->with('success', 'Tienda creada correctamente.');
    }

    public function show($id)
    {
        $store = Store::with(['manager', 'address.city.country'])->findOrFail($id);
        return view('stores.show', compact('store'));
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $addresses = Address::all();
        $staff = Staff::all();

        return view('stores.edit', compact('store', 'addresses', 'staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'manager_staff_id' => 'required',
            'address_id' => 'required',
        ]);

        $store = Store::findOrFail($id);
        $store->update($request->all());

        return redirect()->route('stores.index')->with('success', 'Tienda actualizada correctamente.');
    }

    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->route('stores.index')->with('success', 'Tienda eliminada.');
    }
}


