@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
<div class="container mx-auto py-12 px-6">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white">Lista de Proveedores</h1>
        <a href="{{ route('suppliers.create') }}"
           class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-2 rounded-lg shadow-lg hover:shadow-xl hover:from-indigo-500 hover:to-blue-500 transition duration-300">
            + Crear Proveedor
        </a>
    </div>

    <div class="overflow-hidden rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    @foreach(['Nombre', 'Correo Electrónico', 'Teléfono', 'Descripción', 'Suministros', 'Monto', 'Acciones'] as $header)
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($suppliers as $supplier)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-900 transition">
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $supplier->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $supplier->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $supplier->phone }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $supplier->description }}</td>
                        <td class="px-6 py-4">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach($supplier->supplies as $supply)
                                    <li class="text-sm text-gray-500 dark:text-gray-300">{{ $supply->name }} ({{ $supply->pivot->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">${{ number_format($supplier->amount, 2) }}</td>
                        <td class="px-6 py-4 text-sm flex items-center">
                            <a href="{{ route('suppliers.show', $supplier->id) }}"
                               class="text-blue-500 hover:text-blue-700 mr-4 transition duration-300">
                                Ver
                            </a>
                            <a href="{{ route('suppliers.edit', $supplier->id) }}"
                               class="text-green-600 hover:text-green-800 mr-4 transition duration-300">
                                Editar
                            </a>
                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 transition duration-300"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-500 dark:text-gray-300">
                            No hay proveedores disponibles.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
