@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">Crear Evento</h1>

    <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Nombre del Evento:</label>
            <input type="text" name="name" required class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
        </div>

        <div>
            <label for="description" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Descripción:</label>
            <textarea name="description" class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label for="event_date" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Fecha del Evento:</label>
            <input type="date" name="event_date" required class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
        </div>

        <!-- Forzar visibilidad del botón -->
        <button type="submit"
                class="bg-blue-600 text-white font-bold px-5 py-3 rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300"
                style="color: white; background-color: #1D4ED8; border: 2px solid #000;">
            Crear Evento
        </button>
    </form>
</div>
@endsection
