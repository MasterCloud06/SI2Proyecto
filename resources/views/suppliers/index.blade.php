@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Lista de Proveedores</h1>
    <a href="{{ route('suppliers.create') }}" class="btn-create-event">Crear Proveedor</a>

    <table class="min-w-full bg-white border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4 border">Nombre</th>
                <th class="py-2 px-4 border">Correo Electrónico</th>
                <th class="py-2 px-4 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border">{{ $supplier->name }}</td>
                    <td class="py-2 px-4 border">{{ $supplier->email }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-blue-500">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
