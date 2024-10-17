<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Supply;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     */
    public function index()
    {
        // Recupera todos los proveedores con sus suministros
        $suppliers = Supplier::with('supplies')->get();

        // Calcula el monto total de suministros por proveedor
        foreach ($suppliers as $supplier) {
            $supplier->total_amount = $supplier->supplies->sum(function ($supply) {
                return $supply->pivot->quantity * $supply->pivot->amount; // Usa 'pivot->amount' desde la tabla pivote
            });
        }

        return view('suppliers.index', compact('suppliers'));
    }


    /**
     * Show the form for creating a new supplier.
     */
    public function create()
    {
        $supplies = Supply::all(); // Obtener todos los suministros
        return view('suppliers.create', compact('supplies'));
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
            'supplies' => 'array', // Suministros seleccionados
            'supplies.*.id' => 'exists:supplies,id', // Validar cada suministro
            'supplies.*.quantity' => 'required|numeric|min:1', // Cantidad de cada suministro
        ]);

        try {
            // Crear el proveedor
            $supplier = Supplier::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'description' => $request->description,
            ]);

            $totalAmount = 0;

            // Asociar suministros con el proveedor y calcular el monto total
            foreach ($request->supplies as $supply) {
                $supplyModel = Supply::find($supply['id']); // Buscar el suministro
                $quantity = $supply['quantity'];
                $amount = $supplyModel->amount;

                // Calcular el subtotal y agregarlo al total
                $subtotal = $quantity * $amount;
                $totalAmount += $subtotal;

                // Asociar el suministro con la cantidad en la tabla pivote
                $supplier->supplies()->attach($supply['id'], [
                    'quantity' => $quantity,
                    'amount' => $amount,
                ]);
            }

            // Guardar el monto total en el modelo del proveedor (si tienes un campo para esto)
            $supplier->total_amount = $totalAmount;
            $supplier->save();

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
        $supplier = Supplier::with('supplies')->findOrFail($id); // Cargar suministros relacionados
        $supplies = Supply::all(); // Obtener todos los suministros
        return view('suppliers.edit', compact('supplier', 'supplies'));
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
            'supplies' => 'array', // Suministros seleccionados
            'supplies.*.id' => 'exists:supplies,id', // Validar cada suministro
            'supplies.*.quantity' => 'required|numeric|min:1', // Cantidad de cada suministro
        ]);

        $supplier = Supplier::findOrFail($id);

        try {
            // Actualizar el proveedor
            $supplier->update($request->only(['name', 'email', 'phone', 'description']));

            // Sincronizar suministros con el proveedor
            $supplier->supplies()->sync(
                collect($request->supplies)->mapWithKeys(function ($supply) {
                    return [$supply['id'] => ['quantity' => $supply['quantity']]];
                })
            );

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
        $supplier = Supplier::with('supplies')->findOrFail($id); // Cargar suministros relacionados
        return view('suppliers.show', compact('supplier'));
    }
}
