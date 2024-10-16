@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Tarjeta de bienvenida --}}
            <div class="bg-white rounded-lg shadow-lg p-6 dark:bg-gray-800 mb-8">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
                    ¡Bienvenido, {{ $user->name }}!
                </h2>
                <p class="text-gray-600 dark:text-gray-300">
                    Esta es la página principal de tu aplicación. Explora las opciones disponibles en el menú.
                </p>
            </div>

            {{-- Mostrar la bitácora solo si el usuario es administrador --}}
            @if($user->role === 'admin')
                <h2 class="text-2xl font-bold mb-4">Bitácora de Actividades</h2>
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
                        @forelse($bitacoras as $bitacora)
                            <tr>
                                <td class="border px-4 py-2">{{ $bitacora->user->name }}</td>
                                <td class="border px-4 py-2">{{ $bitacora->accion }}</td>
                                <td class="border px-4 py-2">{{ $bitacora->descripcion }}</td>
                                <td class="border px-4 py-2">{{ $bitacora->fecha_hora }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border px-4 py-2 text-center">No hay registros en la bitácora.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
