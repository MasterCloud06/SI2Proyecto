@extends('layouts.app')

@section('title', 'Lista de Eventos')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Lista de Eventos</h1>

    <div class="mb-6">
        <a href="{{ route('events.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-300">
            Crear Evento
        </a>
    </div>

    <ul class="space-y-4">
        @forelse ($events as $event)
            <li class="flex justify-between items-center bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md hover:shadow-lg transition-all">
                <div class="flex items-center space-x-4">
                    @if($event->image_path)
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->name }}"
                             class="w-16 h-16 rounded-md object-cover">
                    @endif

                    <div>
                        <a href="{{ route('events.show', $event->id) }}"
                           class="text-xl font-semibold text-gray-800 dark:text-gray-100 hover:text-blue-500">
                            {{ $event->name }}
                        </a>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Fecha: {{ $event->event_date }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Categoría: {{ $event->category }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Precio: ${{ $event->price }}</p>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <a href="{{ route('events.edit', $event->id) }}"
                       class="text-green-500 hover:text-green-700 transition-colors duration-300">Editar</a>

                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-500 hover:text-red-700 transition-colors duration-300"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este evento?');">
                            Eliminar
                        </button>
                    </form>
                </div>
            </li>
        @empty
            <li class="text-center text-gray-500 dark:text-gray-300">No hay eventos disponibles.</li>
        @endforelse
    </ul>
</div>
@endsection
