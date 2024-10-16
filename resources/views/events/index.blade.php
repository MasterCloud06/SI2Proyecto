@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">Lista de Eventos</h1>

    <!-- Botón para crear un evento con la nueva clase -->
    <a href="{{ route('events.create') }}"
       class="btn-create-event">
       Crear Evento
    </a>

    <ul class="space-y-4 mt-4">
        @foreach ($events as $event)
            <li class="flex justify-between items-center bg-gray-100 dark:bg-gray-700 p-4 rounded-md shadow hover:shadow-lg transition-all">
                <div>
                    <a href="{{ route('events.show', $event->id) }}"
                       class="text-xl font-semibold text-gray-800 dark:text-gray-100 hover:text-blue-500">
                       {{ $event->name }}
                    </a>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $event->event_date }}</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('events.edit', $event->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
