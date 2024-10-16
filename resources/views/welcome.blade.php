@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
    <div class="flex flex-col items-center justify-center h-screen bg-gradient-to-r from-blue-400 to-blue-600">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl text-center">
            <h1 class="text-4xl font-bold mb-4 text-gray-800">¡Bienvenido a nuestra página de eventos!</h1>

            {{-- Verificación de autenticación --}}
            @guest
                {{-- Contenido para personas no autenticadas --}}
                <p class="text-gray-600 mb-6">
                    Por favor, <a href="{{ route('login') }}" class="text-blue-500 underline">inicia sesión</a> para consultar tu presupuesto y crear eventos increíbles.
                </p>
            @else
                {{-- Verificar rol del usuario autenticado --}}
                @if(Auth::user()->role === 'user')
                    {{-- Contenido para usuarios con rol "user" --}}
                    <p class="text-gray-600 mb-6">
                        Bienvenido, {{ Auth::user()->name }}. Aquí están tus eventos disponibles:
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($events as $event)
                            <div class="bg-gray-100 rounded-lg shadow p-4">
                                <img src="{{ $event->image_url ?? '/path-to-default-image.jpg' }}"
                                     alt="{{ $event->name }}"
                                     class="w-full h-48 object-cover rounded-lg mb-4">
                                <h2 class="text-xl font-semibold text-gray-700">{{ $event->name }}</h2>
                                <p>{{ $event->description }}</p>
                                <p class="text-gray-500 text-sm">Fecha del evento: {{ $event->event_date }}</p>
                            </div>
                        @endforeach
                    </div>
                @elseif(Auth::user()->role === 'admin')
                    {{-- Contenido para administradores con rol "admin" --}}
                    <p class="text-gray-600 mb-6">
                        Bienvenido, administrador {{ Auth::user()->name }}. Aquí puedes gestionar los eventos:
                    </p>
                    <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                        Crear nuevo evento
                    </a>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        @foreach($events as $event)
                            <div class="bg-gray-100 rounded-lg shadow p-4">
                                <img src="{{ $event->image_url ?? '/path-to-default-image.jpg' }}"
                                     alt="{{ $event->name }}"
                                     class="w-full h-48 object-cover rounded-lg mb-4">
                                <h2 class="text-xl font-semibold text-gray-700">{{ $event->name }}</h2>
                                <p>{{ $event->description }}</p>
                                <p class="text-gray-500 text-sm">Fecha del evento: {{ $event->event_date }}</p>
                                <div class="mt-4 flex justify-end space-x-2">
                                    <a href="{{ route('events.edit', $event->id) }}" class="text-blue-500 underline">
                                        Editar
                                    </a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 underline">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    {{-- En caso de que el rol no sea reconocido --}}
                    <p class="text-red-500">Rol desconocido: {{ Auth::user()->role }}.</p>
                @endif
            @endguest
        </div>
    </div>
@endsection
