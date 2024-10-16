@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Editar Proveedor</h1>

        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            @method('PUT')
            <label for="name" class="block mb-2">Nombre:</label>
            <input type="text" name="name" id="name" class="border p-2 mb-4 w-full" value="{{ $supplier->name }}" required>

            <label for="email" class="block mb-2">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="border p-2 mb-4 w-full" value="{{ $supplier->email }}" required>

            <label for="phone" class="block mb-2">Teléfono:</label>
            <input type="text" name="phone" id="phone" class="border p-2 mb-4 w-full" value="{{ $supplier->phone }}">

            <label for="description" class="block mb-2">Descripción:</label>
            <textarea name="description" id="description" class="border p-2 mb-4 w-full">{{ $supplier->description }}</textarea>

            <label for="amount" class="block mb-2">Monto:</label>
            <input type="number" name="amount" id="amount" class="border p-2 mb-4 w-full" value="{{ $supplier->amount }}" step="0.01">

            <button type="submit" class="btn-primary w-full">Guardar Cambios</button>
        </form>
    </div>
@endsection
