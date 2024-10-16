@extends('layouts.app')

@section('title', 'Editar Evento')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">Editar Evento</h1>

    <!-- Verificamos si la variable $event está definida -->
    @if(isset($event))
    <form action="{{ route('events.update', ['event' => $event->id]) }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')

        <div>
            <label for="name" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Nombre del Evento:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}" required
                class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-green-500">
        </div>

        <div>
            <label for="description" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Descripción:</label>
            <textarea name="description" id="description" required
                class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-green-500">{{ old('description', $event->description) }}</textarea>
        </div>

        <div>
            <label for="event_date" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Fecha del Evento:</label>
            <input type="date" name="event_date" id="event_date" value="{{ old('event_date', $event->event_date) }}" required
                class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-green-500">
        </div>

        <button type="submit"
            class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-5 py-3 rounded-md transition-all">
            Actualizar Evento
        </button>
    </form>
    @else
        <p class="text-red-500">El evento no existe o no ha sido encontrado.</p>
    @endif
</div>
@endsection
