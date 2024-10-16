@extends('layouts.app')

@section('title', 'Editar Persona')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Editar Persona</h1>

    <form action="{{ route('admin.update', $persona) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Nombre</label>
            <input type="text" name="name" id="name" value="{{ $persona->name }}" class="mt-1 block w-full border rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ $persona->email }}" class="mt-1 block w-full border rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Contraseña (dejar vacío si no desea cambiarla)</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full border rounded-md">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border rounded-md">
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium">Rol</label>
            <select name="role" id="role" class="mt-1 block w-full border rounded-md" required>
                <option value="user" {{ $persona->role == 'user' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ $persona->role == 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Persona</button>
    </form>
@endsection
