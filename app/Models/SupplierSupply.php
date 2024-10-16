<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierSupply extends Model
{
    use HasFactory;

    protected $table = 'supplier_supply'; // Nombre de la tabla pivote
}
