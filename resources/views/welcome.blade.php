@extends('layouts.app')

@section('title', 'Explora y Gestiona Eventos')

@section('content')
<div class="min-h-screen bg-gray-100">
    <div class="container mx-auto py-12">

        <!-- Encabezado Principal -->
        <h1 class="text-5xl font-extrabold text-center text-gray-800 mb-8">
            ¡Explora y Gestiona Nuestros Eventos!
        </h1>

        <!-- Barra de Búsqueda -->
        <div class="flex justify-center mb-10">
            <div class="relative w-full max-w-3xl">
                <input
                    type="text"
                    placeholder="Buscar eventos..."
                    class="w-full py-4 pl-10 pr-4 rounded-full shadow-lg border border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                >
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 16l4-4m0 0l4-4m-4 4H3m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <!-- Filtros de Categoría -->
        <div class="flex justify-center space-x-4 mb-10">
            <button class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Todos
            </button>
            <button class="px-5 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                Bodas
            </button>
            <button class="px-5 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                Fiestas y Celebraciones
            </button>
            <button class="px-5 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                Conferencias y Seminarios
            </button>
            <button class="px-5 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                Producción de Eventos
            </button>
            <button class="px-5 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                Lugares | Espacios
            </button>
        </div>

        <!-- Tarjetas de Eventos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($events as $event)
                <div class="relative group bg-white rounded-lg shadow-xl overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ $event->image_url ?? '/path-to-default-image.jpg' }}"
                         alt="{{ $event->name }}"
                         class="w-full h-60 object-cover transition-transform transform group-hover:scale-105 duration-500">

                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $event->name }}</h2>
                        <p class="text-gray-600 mt-2">{{ $event->description }}</p>
                        <p class="text-sm text-gray-500 mt-2">
                            Fecha del evento: <span class="font-semibold">{{ $event->event_date }}</span>
                        </p>
                    </div>

                    <!-- Opciones al Hover -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 bg-black bg-opacity-50 transition-opacity duration-300">
                        <a href="{{ route('events.show', $event->id) }}"
                           class="bg-white text-blue-600 px-6 py-2 rounded-full shadow-lg border-2 border-blue-600 mx-2">
                            Ver
                        </a>

                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('events.edit', $event->id) }}"
                                   class="bg-blue-600 text-white px-6 py-2 rounded-full shadow-lg mx-2">
                                    Editar
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
