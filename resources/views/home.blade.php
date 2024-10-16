@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-white rounded-lg shadow-lg p-6 dark:bg-gray-800">
                 @if (session('status'))
                    <div class="alert alert-success text-green-600 mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Mostrar el nombre del usuario --}}
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                    ¡Bienvenido, {{ Auth::user()->name }}!
                </h2>
            </div>
        </div>
    </div>
</div>
@endsection
