@extends('layouts.app')

@section('title', 'Crear Persona')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Crear Persona</h1>

    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Nombre</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full border rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Contraseña</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full border rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium">Rol</label>
            <select name="role" id="role" class="mt-1 block w-full border rounded-md" required>
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Persona</button>
    </form>
@endsection
