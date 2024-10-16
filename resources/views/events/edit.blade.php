@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">Editar Evento</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Nombre del Evento:</label>
            <input type="text" name="name" value="{{ $event->name }}" required class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-green-500">
        </div>

        <div>
            <label for="description" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Descripción:</label>
            <textarea name="description" class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-green-500">{{ $event->description }}</textarea>
        </div>

        <div>
            <label for="event_date" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Fecha del Evento:</label>
            <input type="date" name="event_date" value="{{ $event->event_date }}" required class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-green-500">
        </div>

        <button type="submit" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-5 py-3 rounded-md transition-all">Actualizar Evento</button>
    </form>
</div>
@endsection
