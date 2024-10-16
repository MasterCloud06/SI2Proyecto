<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount'];

    // Relación muchos a muchos con Supplier
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->withPivot('amount');
    }
}
