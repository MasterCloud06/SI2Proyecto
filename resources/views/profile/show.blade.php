<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Profile Information') }}</h3>

                    <!-- Verificar si $user tiene datos -->
                    @if ($user)
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{ __('Name') }}
                            </label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                {{ $user->name }}
                            </p>
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{ __('Email') }}
                            </label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                {{ $user->email }}
                            </p>
                        </div>
                    @else
                        <p>{{ __('No user data found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
