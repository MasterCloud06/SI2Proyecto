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
        'amount',
    ];

    // Relación muchos a muchos con Supply
    public function supplies()
    {
        return $this->belongsToMany(Supply::class)->withPivot('amount');
    }
}
