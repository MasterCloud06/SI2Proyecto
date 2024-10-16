<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // Asegúrate de que solo los usuarios con rol 'admin' puedan acceder
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role === 'admin') {
                return $next($request);
            }

            // Redirigir o lanzar un error si no es admin
            return redirect('/')->with('error', 'No tienes acceso a esta sección.');
        });
    }

    public function index()
    {
        // Código para la vista de administración
        return view('admin.dashboard');
    }
}
