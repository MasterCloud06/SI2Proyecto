@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <!-- Verificar si hay imagen -->
    @if($event->image_path && Storage::exists('public/' . $event->image_path))
        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->name }}"
             class="w-full h-80 object-cover rounded-lg shadow-md mb-6">
    @else
        <div class="w-full h-80 bg-gray-300 dark:bg-gray-700 rounded-lg flex items-center justify-center mb-6">
            <span class="text-gray-500 dark:text-gray-400">Sin imagen disponible</span>
        </div>
    @endif

    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">{{ $event->name }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Detalles del evento -->
        <div>
            <p class="text-lg text-gray-700 dark:text-gray-200 mb-4">{{ $event->description }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                <strong>Fecha del Evento:</strong> {{ $event->event_date }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                <strong>Categoría:</strong> {{ $event->category }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                <strong>Ubicación:</strong> {{ $event->location ?? 'No especificada' }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                <strong>Capacidad:</strong> {{ $event->capacity ?? 'Sin límite' }} personas
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                <strong>Precio:</strong> ${{ number_format($event->price, 2) }}
            </p>
        </div>

        <!-- Acciones -->
        <div class="flex flex-col items-center md:items-end space-y-4">
            <a href="{{ route('events.index') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Volver a la lista
            </a>

            @auth
                @if(auth()->user()->role === 'admin')
                    <div class="flex space-x-3">
                        <a href="{{ route('events.edit', $event->id) }}"
                           class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                            Editar Evento
                        </a>

                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este evento?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                Eliminar Evento
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection
