<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new supplier.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created supplier in storage.
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:suppliers',
            'phone' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'amount' => 'nullable|numeric',
        ]);

        try {
            // Crear el proveedor
            Supplier::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'description' => $request->description,
                'amount' => $request->amount,
            ]);

            // Redireccionar con mensaje de éxito
            return redirect()->route('suppliers.index')->with('success', 'Proveedor creado correctamente.');
        } catch (\Exception $e) {
            // Redireccionar con mensaje de error
            return redirect()->route('suppliers.create')->with('error', 'Error al crear el proveedor: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified supplier.
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified supplier in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:suppliers,email,' . $id,
            'phone' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'amount' => 'nullable|numeric',
        ]);

        $supplier = Supplier::findOrFail($id);

        try {
            // Actualizar el proveedor
            $supplier->update($request->only(['name', 'email', 'phone', 'description', 'amount']));
            return redirect()->route('suppliers.index')->with('success', 'Proveedor actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('suppliers.edit', $id)->with('error', 'Error al actualizar el proveedor: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified supplier from storage.
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        try {
            $supplier->delete();
            return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('suppliers.index')->with('error', 'Error al eliminar el proveedor: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified supplier.
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }
}
