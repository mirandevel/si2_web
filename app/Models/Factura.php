<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';

    protected $fillable = [
        'total',
        'estado',
        'ubicacion',
        'fecha',
        'telefono',
        'usuario_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
