@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Lista de Proveedores</h1>
        <a href="{{ route('suppliers.create') }}" class="btn-create-event mb-4 inline-block">Crear Proveedor</a>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 mt-4">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4 border">Nombre</th>
                        <th class="py-2 px-4 border">Correo Electrónico</th>
                        <th class="py-2 px-4 border">Teléfono</th>
                        <th class="py-2 px-4 border">Descripción</th>
                        <th class="py-2 px-4 border">Monto</th>
                        <th class="py-2 px-4 border text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border">{{ $supplier->name }}</td>
                            <td class="py-2 px-4 border">{{ $supplier->email }}</td>
                            <td class="py-2 px-4 border">{{ $supplier->phone }}</td>
                            <td class="py-2 px-4 border">{{ $supplier->description }}</td>
                            <td class="py-2 px-4 border">{{ $supplier->amount }}</td>
                            <td class="py-2 px-4 border text-center">
                                <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-blue-500">Editar</a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-4">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
