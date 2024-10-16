@extends('layouts.app')

@section('title', 'Editar Empleador')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Editar Empleador</h1>

    <form action="{{ route('employers.update', $employer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" class="border p-2 mb-4 w-full" value="{{ $employer->name }}" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" class="border p-2 mb-4 w-full" value="{{ $employer->email }}" required>

        <label for="phone">Teléfono:</label>
        <input type="text" name="phone" id="phone" class="border p-2 mb-4 w-full" value="{{ $employer->phone }}" required>

        <label for="job_title">Cargo:</label>
        <input type="text" name="job_title" id="job_title" class="border p-2 mb-4 w-full" value="{{ $employer->job_title }}" required>

        <label for="amount">Monto:</label>
        <input type="number" name="amount" id="amount" class="border p-2 mb-4 w-full" value="{{ $employer->amount }}" step="0.01" required>

        <button type="submit" class="btn-primary">Guardar Cambios</button>
    </form>
@endsection
