@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="text-2xl font-bold mb-6">Bitácora de Actividades</h2>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Usuario</th>
                <th class="border px-4 py-2">Acción</th>
                <th class="border px-4 py-2">Descripción</th>
                <th class="border px-4 py-2">Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bitacoras as $bitacora)
                <tr>
                    <td class="border px-4 py-2">{{ $bitacora->user->name }}</td>
                    <td class="border px-4 py-2">{{ $bitacora->accion }}</td>
                    <td class="border px-4 py-2">{{ $bitacora->descripcion }}</td>
                    <td class="border px-4 py-2">{{ $bitacora->fecha_hora }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
