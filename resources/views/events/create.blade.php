@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">Crear Evento</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded-md mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Nombre del Evento:</label>
            <input type="text" name="name" required class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
        </div>

        <div>
            <label for="description" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Descripción:</label>
            <textarea name="description" rows="4" class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label for="event_date" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Fecha del Evento:</label>
            <input type="date" name="event_date" required class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
        </div>

        <div>
            <label for="location" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Ubicación:</label>
            <input type="text" name="location" class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
        </div>

        <div>
            <label for="capacity" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Capacidad:</label>
            <input type="number" name="capacity" min="1" class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
        </div>

        <div>
            <label for="category" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Categoría:</label>
            <select name="category" required class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
                <option value="Bodas">Bodas</option>
                <option value="Fiestas">Fiestas y Celebraciones</option>
                <option value="Conferencias">Conferencias y Seminarios</option>
                <option value="Producción">Producción de Eventos</option>
            </select>
        </div>

        <div>
            <label for="price" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Precio:</label>
            <input type="number" name="price" step="0.01" min="0" class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
        </div>

        <div>
            <label for="image" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Imagen del Evento:</label>
            <input type="file" name="image" class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-500">
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 text-white font-bold px-5 py-3 rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300"
                style="color: white; background-color: #1D4ED8; border: 2px solid #000;">
                Crear Evento
            </button>
        </div>
    </form>
</div>
@endsection
