@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Mostrar el nombre del usuario que se ha logueado --}}
                    <h1 class="text-2xl font-bold">Bienvenido, {{ Auth::user()->name }}!</h1>
                    <p class="mt-4">Has iniciado sesión correctamente.</p>

                    {{-- Mostrar la lista de eventos creados --}}
                    <div class="mt-8">
                        <h2 class="text-2xl font-bold">Eventos Creados</h2>
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8 mt-4">
                            @forelse($events as $event)
                                <div class="flex flex-col items-start gap-4 rounded-lg bg-white p-6 shadow-md transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">{{ $event->name }}</h2>
                                    <p class="mt-4 text-sm/relaxed">
                                        {{ $event->description }}
                                    </p>
                                    <p class="text-gray-600 dark:text-gray-400">Fecha del Evento: {{ $event->event_date }}</p>
                                </div>
                            @empty
                                <p>No hay eventos creados todavía.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
