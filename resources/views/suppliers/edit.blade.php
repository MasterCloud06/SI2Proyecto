@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Editar Proveedor</h1>

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" class="border p-2 mb-4 w-full" value="{{ $supplier->name }}" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" class="border p-2 mb-4 w-full" value="{{ $supplier->email }}" required>

        <button type="submit" class="btn-primary">Guardar Cambios</button>
    </form>
@endsection
