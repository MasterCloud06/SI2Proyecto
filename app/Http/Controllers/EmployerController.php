<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    /**
     * Display a listing of the employers.
     */
    public function index()
    {
        $employers = Employer::all();
        return view('employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new employer.
     */
    public function create()
    {
        return view('employers.create');
    }

    /**
     * Store a newly created employer in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employers',
            'phone' => 'required|string|max:15',
            'job_title' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Employer::create($request->all());

        return redirect()->route('employers.index')->with('success', 'Empleador creado exitosamente.');
    }

    /**
     * Show the form for editing the specified employer.
     */
    public function edit(Employer $employer)
    {
        return view('employers.edit', compact('employer'));
    }

    /**
     * Update the specified employer in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employers,email,' . $employer->id,
            'phone' => 'required|string|max:15',
            'job_title' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $employer->update($request->all());

        return redirect()->route('employers.index')->with('success', 'Empleador actualizado exitosamente.');
    }

    /**
     * Remove the specified employer from storage.
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();
        return redirect()->route('employers.index')->with('success', 'Empleador eliminado exitosamente.');
    }
}
