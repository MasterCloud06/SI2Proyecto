<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount'];

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_supply')
            ->withPivot('amount') // Incluir la columna amount de la tabla pivote
            ->withTimestamps(); // Incluir timestamps si los necesitas
    }
}
