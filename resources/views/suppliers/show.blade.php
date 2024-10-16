@extends('layouts.app')

@section('title', 'Detalles del Proveedor')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Detalles del Proveedor</h1>

    <p><strong>Nombre:</strong> {{ $supplier->name }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $supplier->email }}</p>

    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn-primary mt-4">Editar</a>
    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="mt-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-primary">Eliminar</button>
    </form>
@endsection
