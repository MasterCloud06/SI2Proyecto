@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6 border-b-2 pb-3 border-indigo-500">
        Editar Perfil
    </h1>

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PATCH')

        <!-- Nombre -->
        <div>
            <label for="name" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Nombre:</label>
            <input type="text" name="name" id="name" class="w-full p-2 mt-2 border border-gray-300 rounded-lg shadow-sm" value="{{ old('name', $user->name) }}" required>
            @error('name')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Email:</label>
            <input type="email" name="email" id="email" class="w-full p-2 mt-2 border border-gray-300 rounded-lg shadow-sm" value="{{ old('email', $user->email) }}" required>
            @error('email')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botón de guardar -->
        <div class="mt-6">
            <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection
