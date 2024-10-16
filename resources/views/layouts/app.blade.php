<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>

    <!-- Incluye el CSS y JS utilizando Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles adicionales -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .btn-primary {
            background-color: #4F46E5;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4338CA;
        }

        footer {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        nav a {
            position: relative;
        }

        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #4F46E5;
            left: 50%;
            bottom: -4px;
            transition: width 0.3s, left 0.3s;
        }

        nav a:hover::after {
            width: 100%;
            left: 0;
        }

        .btn-create-event {
            background-color: #4F46E5;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            display: inline-block;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-create-event:hover {
            background-color: #4338CA;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-lg sticky top-0 z-50 transition-colors duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/"
                class="text-3xl font-bold text-gray-900 dark:text-gray-100 hover:text-blue-500 transition-colors duration-300">
                Mi Aplicación
            </a>
            <nav>
                <ul class="flex space-x-8 items-center">
                    @auth
                        <!--
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="text-lg text-gray-800 dark:text-gray-200 hover:text-blue-500 transition-colors duration-300">
                                Dashboard
                            </a>
                        </li>
                        --->
                        @if(Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('events.index') }}"
                                    class="text-lg text-gray-800 dark:text-gray-200 hover:text-blue-500 transition-colors duration-300">
                                    Eventos
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('profile.index') }}"
                                class="text-lg text-gray-800 dark:text-gray-200 hover:text-blue-500 transition-colors duration-300">
                                Perfil
                            </a>
                        </li>
                        @if(Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('users.index') }}"
                                    class="text-lg text-gray-800 dark:text-gray-200 hover:text-blue-500 transition-colors duration-300">
                                    Usuarios
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('suppliers.index') }}"
                                    class="text-lg text-gray-800 dark:text-gray-200 hover:text-blue-500 transition-colors duration-300">
                                    Proveedores
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('employers.index') }}"
                                    class="text-lg text-gray-800 dark:text-gray-200 hover:text-blue-500 transition-colors duration-300">
                                    Empleadores
                                </a>
                            </li>
                        @endif
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="btn-primary">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}"
                                class="text-lg text-gray-800 dark:text-gray-200 hover:text-blue-500 transition-colors duration-300">
                                Iniciar Sesión
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                                class="text-lg text-gray-800 dark:text-gray-200 hover:text-blue-500 transition-colors duration-300">
                                Registrarse
                            </a>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="flex-grow container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 shadow-lg py-6">
        <div class="container mx-auto text-center text-gray-600 dark:text-gray-400">
            <p>© 2024 Mi Aplicación. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>
