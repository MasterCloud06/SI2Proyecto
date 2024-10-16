@extends('layouts.app')

@section('title', 'Crear Proveedor')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Crear Proveedor</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-700 p-4 mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-200 text-red-700 p-4 mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('suppliers.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <label for="name" class="block mb-2">Nombre:</label>
            <input type="text" name="name" id="name" class="border p-2 mb-4 w-full" required>

            <label for="email" class="block mb-2">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="border p-2 mb-4 w-full" required>

            <label for="phone" class="block mb-2">Teléfono:</label>
            <input type="text" name="phone" id="phone" class="border p-2 mb-4 w-full">

            <label for="description" class="block mb-2">Descripción:</label>
            <textarea name="description" id="description" class="border p-2 mb-4 w-full"></textarea>

            <label for="amount" class="block mb-2">Monto:</label>
            <input type="number" name="amount" id="amount" class="border p-2 mb-4 w-full" step="0.01">

            <button type="submit" class="btn-primary w-full">Crear</button>
        </form>
    </div>
@endsection
