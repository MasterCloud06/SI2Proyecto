<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Mostrar los datos del usuario para comprobar
        dd($user);
    }



    public function edit()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // Puedes agregar más campos según tu estructura
        ]);

        // Actualizar la información del usuario
        $user = Auth::user();
        $user->update($validatedData);

        return redirect()->route('profile.index')->with('success', 'Perfil actualizado con éxito.');
    }
}
