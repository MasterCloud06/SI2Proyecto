<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\Bitacora;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        Bitacora::create([
            'user_id' => $event->user->id,
            'accion' => 'Inicio de sesión',
            'descripcion' => 'El usuario ' . $event->user->name . ' ha iniciado sesión.',
        ]);
    }
}
