@extends('layouts.app')

@section('title', 'Detalles del Proveedor')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Detalles del Proveedor</h1>

        <div class="text-center mb-4">
            <p><strong>Nombre:</strong> {{ $supplier->name }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $supplier->email }}</p>
            <p><strong>Teléfono:</strong> {{ $supplier->phone }}</p>
            <p><strong>Descripción:</strong> {{ $supplier->description }}</p>
            <p><strong>Monto:</strong> {{ $supplier->amount }}</p>
        </div>

        <h2 class="text-xl font-bold mb-4">Suministros Asociados</h2>
        <ul class="list-disc pl-5 mb-4">
            @foreach($supplier->supplies as $supply)
                <li>{{ $supply->name }} (Cantidad: {{ $supply->pivot->quantity }})</li>
            @endforeach
        </ul>

        <div class="text-center">
            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn-primary">Editar</a>
            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-primary text-red-500 ml-4">Eliminar</button>
            </form>
        </div>
    </div>
@endsection
