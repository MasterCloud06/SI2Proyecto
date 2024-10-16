<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;

class BitacoraController extends Controller
{
    public function index()
    {
        $bitacoras = Bitacora::with('user')->orderBy('fecha_hora', 'desc')->get();
        return view('bitacora.index', compact('bitacoras'));
    }
}
