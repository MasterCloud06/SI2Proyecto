{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', 'Eventos')

@section('content')
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-center">Lista de Eventos</h2>
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nombre del Evento</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Fecha del Evento</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($events as $event)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $event->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $event->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $event->event_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">No hay eventos creados todavía.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <h1 class="text-3xl font-semibold text-center mt-8">Acerca de Nosotros</h1>
    <p class="mt-4 text-center">Esta es una aplicación desarrollada para gestionar eventos de manera eficiente.</p>

@endsection
