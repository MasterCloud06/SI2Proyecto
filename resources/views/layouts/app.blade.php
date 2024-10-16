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

        .footer-section {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
        }

        .footer-section h3 {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            display: block;
            margin-bottom: 0.3rem;
            color: #4F46E5;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #4338CA;
        }
    </style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col">

    <header class="bg-white dark:bg-gray-800 shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-8">
                <a href="/"
                    class="text-3xl font-bold text-gray-900 dark:text-white hover:text-blue-500 transition duration-300">
                    Mi Aplicación
                </a>

                <div class="hidden md:flex space-x-6">
                    <!-- Mostrar el botón Inicio solo a usuarios autenticados -->
                    @auth
                        <a href="{{ route('home') }}"
                            class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition duration-300">
                            Inicio
                        </a>
                    @endauth

                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('events.index') }}"
                                class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Eventos</a>
                            <a href="{{ route('suppliers.index') }}"
                                class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Proveedores</a>
                            <a href="{{ route('employers.index') }}"
                                class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Empleadores</a>
                            <a href="{{ route('supplies.index') }}"
                                class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Suministros</a>
                            <a href="{{ route('users.index') }}"
                                class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition duration-300">
                                Gestionar Usuarios
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ route('profile.index') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="btn-primary">Cerrar Sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Iniciar
                        Sesión</a>
                    <a href="{{ route('register') }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Registrarse</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main content -->
    <main class="flex-grow container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 dark:bg-gray-800 shadow-inner py-10">
        <div
            class="container mx-auto footer-section text-gray-700 dark:text-gray-300 grid gap-8 md:grid-cols-5 sm:grid-cols-2 px-4">
            <div>
                <h3 class="text-lg font-semibold mb-4">Producto</h3>
                <a href="#">Gestión de Eventos</a>
                <a href="#">Presupuestos</a>
                <a href="#">Reportes</a>
                <a href="#">Calendario</a>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Soluciones</h3>
                <a href="#">Organización de Bodas</a>
                <a href="#">Fiestas y Celebraciones</a>
                <a href="#">Conferencias</a>
                <a href="#">Producción de Eventos</a>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Aprende</h3>
                <a href="#">Blog</a>
                <a href="#">Tutoriales</a>
                <a href="#">Soporte</a>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Soporte</h3>
                <a href="#">Centro de Ayuda</a>
                <a href="#">Contacto</a>
                <a href="#">Preguntas Frecuentes</a>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Empresa</h3>
                <a href="#">Sobre Nosotros</a>
                <a href="#">Política de Privacidad</a>
                <a href="#">Términos de Uso</a>
            </div>
        </div>

        <div class="container mx-auto text-center mt-10">
            <div class="flex justify-center space-x-6 mb-4">
                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-blue-400 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-pink-500 hover:text-pink-700"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-red-600 hover:text-red-800"><i class="fab fa-youtube"></i></a>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">© 2024 Mi Aplicación. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>
