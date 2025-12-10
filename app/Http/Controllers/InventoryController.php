<?php

namespace App\Http\Controllers;

use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::with(['film', 'store'])->limit(50)->get();
        return view('inventory.index', compact('inventory'));
    }
}
