<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Asegura que solo usuarios autenticados accedan.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el dashboard de la aplicación.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        // Obtener las bitácoras solo si el usuario es administrador
        $bitacoras = $user->role === 'admin'
            ? Bitacora::with('user')->orderBy('fecha_hora', 'desc')->get()
            : [];

        return view('home', [
            'bitacoras' => $bitacoras,
            'user' => $user,
        ]);
    }
}
