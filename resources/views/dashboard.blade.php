<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg mb-6">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <!-- Verificación directa del nombre del usuario autenticado -->
                    @if (auth()->check())
                        <h3 class="text-2xl font-bold mb-4">{{ "¡Bienvenido, " . auth()->user()->name . "!" }}</h3>
                    @else
                        <h3 class="text-2xl font-bold mb-4">¡Usuario no autenticado!</h3>
                    @endif
                    <p class="text-lg">{{ __("Selecciona una opción para continuar.") }}</p>
                </div>
            </div>

            <!-- Enlaces a funcionalidades del sistema -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Gestionar Eventos -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-3">Gestionar Eventos</h3>
                    <a href="{{ route('events.index') }}" class="text-blue-500 hover:text-blue-700 flex items-center transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m4 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Ver eventos
                    </a>
                </div>

                <!-- Gestionar Usuarios -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-3">Gestionar Usuarios</h3>
                    <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700 flex items-center transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.657-1.343-3-3-3s-3 1.343-3 3 1.343 3 3 3 3-1.343 3-3zM17 11c0-1.657-1.343-3-3-3s-3 1.343-3 3 1.343 3 3 3 3-1.343 3-3zM17 21v-4a4 4 0 00-4-4H7a4 4 0 00-4 4v4"/>
                        </svg>
                        Ver usuarios
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
