@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">Editar Usuario</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <!-- Nombre -->
            <div>
                <label for="name" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    required class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Correo Electrónico:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    required class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Contraseña -->
            <div>
                <label for="password" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Contraseña (Dejar en blanco si no deseas cambiarla):</label>
                <input type="password" name="password" id="password"
                    class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Roles -->
            <div>
                <label for="roles" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Roles:</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($roles as $role)
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                    {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                                    class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700 dark:text-gray-200">{{ $role->name }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('roles')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón para actualizar -->
            <button type="submit"
                class="bg-blue-600 text-white font-bold px-5 py-3 rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Actualizar Usuario
            </button>
        </form>
    </div>
@endsection
