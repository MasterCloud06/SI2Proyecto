<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'description',
    ];

    public function supplies()
    {
        return $this->belongsToMany(Supply::class, 'supplier_supply')
            ->withPivot('amount') // Incluir la columna amount de la tabla pivote
            ->withTimestamps(); // Incluir timestamps si los necesitas
    }
}
