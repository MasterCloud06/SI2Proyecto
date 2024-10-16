@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">{{ $event->name }}</h1>
    <p class="text-lg text-gray-700 dark:text-gray-200 mb-4">{{ $event->description }}</p>
    <p class="text-gray-600 dark:text-gray-400">Fecha del Evento: {{ $event->event_date }}</p>
</div>
@endsection
