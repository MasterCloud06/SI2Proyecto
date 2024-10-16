<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Asegúrate de usar esta clase
use Illuminate\Notifications\Notifiable;

class Persona extends Authenticatable
{
    use HasFactory, Notifiable;

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Campos que se ocultarán en la serialización
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Método para verificar si una persona es admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
