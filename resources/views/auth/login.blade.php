@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Iniciar Sesión</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
                <input id="email" type="email" class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autofocus>

                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
                <input id="password" type="password" class="w-full px-3 py-2 border rounded-lg @error('password') border-red-500 @enderror" name="password" required>

                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2 leading-tight" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="text-gray-700">Recordarme</label>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                    Iniciar Sesión
                </button>
            </div>

            <!-- Forgot Password -->
            <div class="mt-4 text-center">
                @if (Route::has('password.request'))
                    <a class="text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
