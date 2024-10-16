<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'accion', 'descripcion', 'fecha_hora'];

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
