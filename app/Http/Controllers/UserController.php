<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; // Importamos el modelo Role
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Método para listar todos los usuarios con sus roles
    public function index()
    {
        $users = User::with('roles')->get(); // Incluimos los roles relacionados
        return view('users.index', compact('users')); // Devuelve una vista con los usuarios
    }

    // Método para crear un nuevo usuario
    public function create()
    {
        $roles = Role::all(); // Obtenemos todos los roles disponibles
        return view('users.create', compact('roles')); // Devolvemos la vista para crear usuarios con los roles disponibles
    }

    // Método para almacenar un nuevo usuario con roles opcionales
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'roles' => 'array', // Validamos que los roles sean un array
        ]);

        // Creamos el usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Si se seleccionaron roles, los asignamos al usuario
        if (!empty($validatedData['roles'])) {
            $user->roles()->sync($validatedData['roles']);
        }

        return redirect()->route('users.index')->with('success', 'Usuario creado y roles asignados correctamente.');
    }

    // Método para mostrar un usuario específico con sus roles
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id); // Incluimos los roles en la consulta
        $roles = Role::all(); // Obtenemos todos los roles para asignar
        return view('users.assign_roles', compact('user', 'roles')); // Devolvemos la vista para asignar roles
    }

    // Método para editar un usuario
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all(); // Obtenemos todos los roles disponibles
        return view('users.edit', compact('user', 'roles'));
    }

    // Método para actualizar un usuario y sus roles
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'sometimes|required',
            'roles' => 'array', // Validamos que los roles sean un array
        ]);

        // Si se actualiza la contraseña, la encriptamos
        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        // Actualizamos los datos del usuario
        $user->update($validatedData);

        // Si se enviaron roles, los sincronizamos
        if (isset($validatedData['roles'])) {
            $user->roles()->sync($validatedData['roles']);
        }

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    // Método para asignar roles a un usuario
    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validamos que los roles enviados sean un array de IDs existentes
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id', // Cada ID debe existir en la tabla roles
        ]);

        // Sincronizamos los roles con los proporcionados en la solicitud
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('success', 'Roles asignados correctamente.');
    }
}
