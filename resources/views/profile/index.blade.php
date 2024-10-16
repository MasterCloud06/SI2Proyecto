@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">Perfil de Usuario</h1>

    <div class="space-y-4">
        <div>
            <label class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Nombre:</label>
            <p class="text-lg text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
        </div>

        <div>
            <label class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Email:</label>
            <p class="text-lg text-gray-900 dark:text-gray-100">{{ $user->email }}</p>
        </div>
    </div>
</div>
@endsection
