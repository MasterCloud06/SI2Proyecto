<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'event_date',
        'location',
        'capacity',
        'category',
        'price',
        'image_path',  // Asegúrate de usar el campo correcto para la imagen
        'user_id',  // Relacionar el evento con el creador (usuario)
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
