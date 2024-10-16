<?php

// SupplyController.php

namespace App\Http\Controllers;

use App\Models\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    public function index()
    {
        $supplies = Supply::all();
        return view('supplies.index', compact('supplies'));
    }

    public function create()
    {
        return view('supplies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Supply::create($request->all());

        return redirect()->route('supplies.index')->with('success', 'Suministro creado exitosamente.');
    }

    public function edit(Supply $supply)
    {
        return view('supplies.edit', compact('supply'));
    }

    public function update(Request $request, Supply $supply)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $supply->update($request->all());

        return redirect()->route('supplies.index')->with('success', 'Suministro actualizado exitosamente.');
    }

    public function destroy(Supply $supply)
    {
        $supply->delete();
        return redirect()->route('supplies.index')->with('success', 'Suministro eliminado exitosamente.');
    }
}
