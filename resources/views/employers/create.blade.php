@extends('layouts.app')

@section('title', 'Crear Empleador')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Crear Empleador</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-200 text-red-700 p-4 mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('employers.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" class="border p-2 mb-4 w-full" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" class="border p-2 mb-4 w-full" required>

        <label for="phone">Teléfono:</label>
        <input type="text" name="phone" id="phone" class="border p-2 mb-4 w-full" required>

        <label for="job_title">Cargo:</label>
        <input type="text" name="job_title" id="job_title" class="border p-2 mb-4 w-full" required>

        <label for="amount">Monto:</label>
        <input type="number" name="amount" id="amount" class="border p-2 mb-4 w-full" step="0.01" required>

        <button type="submit" class="btn-primary">Crear</button>
    </form>
@endsection
