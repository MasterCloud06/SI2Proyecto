@extends('layouts.app')

@section('title', 'Suministros')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">Listado de Suministros</h1>

    <!-- Botón para agregar un nuevo suministro -->
    <a href="{{ route('supplies.create') }}"
       class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-lg mb-6 inline-block">
       Agregar Suministro
    </a>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <p class="text-green-500 mb-6">{{ session('success') }}</p>
    @endif

    <!-- Tabla de suministros -->
    <table class="w-full table-auto bg-gray-100 dark:bg-gray-700 rounded-lg">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left text-lg text-gray-700 dark:text-gray-200">Nombre</th>
                <th class="px-4 py-2 text-left text-lg text-gray-700 dark:text-gray-200">Monto</th>
                <th class="px-4 py-2 text-lg text-gray-700 dark:text-gray-200">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supplies as $supply)
                <tr class="border-b">
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $supply->name }}</td>
                    <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $supply->amount }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('supplies.edit', $supply->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Editar</a>
                        <form action="{{ route('supplies.destroy', $supply->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-lg" onclick="return confirm('¿Estás seguro de que deseas eliminar este suministro?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
