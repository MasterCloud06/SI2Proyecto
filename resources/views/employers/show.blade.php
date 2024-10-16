@extends('layouts.app')

@section('title', 'Detalles del Empleador')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Detalles del Empleador</h1>

    <p><strong>Nombre:</strong> {{ $employer->name }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $employer->email }}</p>
    <p><strong>Teléfono:</strong> {{ $employer->phone }}</p>
    <p><strong>Cargo:</strong> {{ $employer->job_title }}</p>
    <p><strong>Monto:</strong> {{ $employer->amount }}</p>

    <a href="{{ route('employers.edit', $employer->id) }}" class="btn-primary mt-4">Editar</a>
    <form action="{{ route('employers.destroy', $employer->id) }}" method="POST" class="mt-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-primary">Eliminar</button>
    </form>
@endsection
