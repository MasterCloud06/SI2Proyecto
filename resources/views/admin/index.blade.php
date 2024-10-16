@extends('layouts.app')

@section('title', 'Lista de Personas')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Lista de Personas</h1>
    <a href="{{ route('admin.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear Persona</a>

    <table class="min-w-full border">
        <thead>
            <tr>
                <th class="py-2 border">Nombre</th>
                <th class="py-2 border">Email</th>
                <th class="py-2 border">Rol</th>
                <th class="py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
                <tr>
                    <td class="py-2 border">{{ $persona->name }}</td>
                    <td class="py-2 border">{{ $persona->email }}</td>
                    <td class="py-2 border">{{ $persona->role }}</td>
                    <td class="py-2 border">
                        <a href="{{ route('admin.edit', $persona) }}" class="text-blue-500">Editar</a>
                        <form action="{{ route('admin.destroy', $persona) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
