@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6 border-b-2 pb-3 border-indigo-500">
        Perfil de Usuario
    </h1>

    <div class="space-y-4 text-lg">
        <div class="flex items-center space-x-4">
            <label class="block text-xl text-gray-700 dark:text-gray-200 font-semibold">Nombre:</label>
            <p class="text-xl text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
        </div>

        <div class="flex items-center space-x-4">
            <label class="block text-xl text-gray-700 dark:text-gray-200 font-semibold">Email:</label>
            <p class="text-xl text-gray-900 dark:text-gray-100">{{ $user->email }}</p>
        </div>

        <!-- Botón para editar perfil -->
        <div class="mt-6">
            <a href="{{ route('profile.edit') }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                Editar Perfil
            </a>
        </div>
    </div>
</div>
@endsection
