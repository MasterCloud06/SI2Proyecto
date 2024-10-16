@extends('layouts.app')

@section('title', 'Editar Suministro')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">Editar Suministro</h1>

    <form action="{{ route('supplies.update', $supply->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')

        <div>
            <label for="name" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Nombre del Suministro:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $supply->name) }}" required
                class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-green-500">
        </div>

        <div>
            <label for="amount" class="block text-lg text-gray-700 dark:text-gray-200 font-semibold">Monto:</label>
            <input type="number" name="amount" id="amount" value="{{ old('amount', $supply->amount) }}" required step="0.01"
                class="w-full p-3 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-green-500">
        </div>

        <button type="submit" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-5 py-3 rounded-md transition-all">
            Actualizar Suministro
        </button>
    </form>
</div>
@endsection
