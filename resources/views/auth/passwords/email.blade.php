@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Restablecer Contraseña</h2>

        <div class="card-body">
            @if (session('status'))
                <div class="mb-4 text-green-500">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Correo Electrónico -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
                    <input id="email" type="email" class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">

                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botón de enviar enlace -->
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                        Enviar enlace para restablecer contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
