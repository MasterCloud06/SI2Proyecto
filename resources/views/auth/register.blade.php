@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Registrarse</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
                <input id="name" type="text" class="w-full px-3 py-2 border rounded-lg @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autofocus>

                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
                <input id="email" type="email" class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required>

                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
                <input id="password" type="password" class="w-full px-3 py-2 border rounded-lg @error('password') border-red-500 @enderror" name="password" required>

                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-4">
                <label for="password-confirm" class="block text-gray-700 font-bold mb-2">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="w-full px-3 py-2 border rounded-lg" name="password_confirmation" required>
            </div>

            <!-- Botón de registro -->
            <div class="flex items-center justify-between">
                <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition duration-200">
                    Registrarse
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
