@extends('layouts.app')

@section('title', 'Suministros')

@section('content')
<div class="container mx-auto py-12 px-6">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white">Listado de Suministros</h1>
        <a href="{{ route('supplies.create') }}"
           class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-2 rounded-lg shadow-lg hover:shadow-xl hover:from-indigo-500 hover:to-blue-500 transition duration-300">
            + Agregar Suministro
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    @foreach(['Nombre', 'Monto', 'Acciones'] as $header)
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($supplies as $supply)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-900 transition">
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $supply->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $supply->amount }}</td>
                        <td class="px-6 py-4 text-sm flex items-center space-x-4">
                            <a href="{{ route('supplies.edit', $supply->id) }}"
                               class="text-blue-500 hover:text-blue-700 transition duration-300">
                                Editar
                            </a>
                            <form action="{{ route('supplies.destroy', $supply->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 transition duration-300"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este suministro?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-6 text-gray-500 dark:text-gray-300">
                            No hay suministros disponibles.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
