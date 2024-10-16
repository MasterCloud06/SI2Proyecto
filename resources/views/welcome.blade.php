{{-- resources/views --}}
@extends('layouts.app')

@section('title', 'Eventos')
''
@section('content')
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-center">Lista de Eventos</h2>
        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8 mt-8">
            @forelse($events as $event)
                <div class="flex flex-col items-start gap-4 rounded-lg bg-white p-6 shadow-md transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900">
                    <h2 class="text-xl font-semibold text-black dark:text-white">{{ $event->name }}</h2>
                    <p class="mt-4 text-sm/relaxed">
                        {{ $event->description }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400">Fecha del Evento: {{ $event->event_date }}</p>
                </div>
            @empty
                <p class="text-center">No hay eventos creados todavía.</p>
            @endforelse
        </div>
    </div>
    <h1 class="text-3xl font-semibold text-center">Acerca de Nosotros</h1>
    <p class="mt-4 text-center">Esta es una aplicación desarrollada para gestionar eventos de manera eficiente.</p>

@endsection
