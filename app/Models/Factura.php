<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';

    protected $fillable = ['estado', 'total', 'usuario_id', 'tipo_pago_id'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
