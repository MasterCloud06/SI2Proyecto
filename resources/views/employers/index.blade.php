@extends('layouts.app')

@section('title', 'Lista de Empleadores')

@section('content')
<div class="container mx-auto py-12 px-6">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white">Lista de Empleadores</h1>
        <a href="{{ route('employers.create') }}"
           class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-2 rounded-lg shadow-lg hover:shadow-xl hover:from-indigo-500 hover:to-blue-500 transition duration-300">
            + Crear Empleador
        </a>
    </div>

    <div class="overflow-hidden rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    @foreach(['Nombre', 'Correo Electrónico', 'Teléfono', 'Cargo', 'Monto', 'Acciones'] as $header)
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($employers as $employer)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-900 transition">
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $employer->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $employer->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $employer->phone }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $employer->job_title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $employer->amount }}</td>
                        <td class="px-6 py-4 text-sm flex items-center">
                            <a href="{{ route('employers.edit', $employer->id) }}"
                               class="text-green-600 hover:text-green-800 mr-4 transition duration-300">
                                Editar
                            </a>
                            <form action="{{ route('employers.destroy', $employer->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 transition duration-300"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este empleador?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500 dark:text-gray-300">
                            No hay empleadores disponibles.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
