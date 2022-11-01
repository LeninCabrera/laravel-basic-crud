<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    // protected $table = '';

    protected $fillable = [
        'producto',
        'cantidad',
        'precio',
        'factura_id',
    ];
}
