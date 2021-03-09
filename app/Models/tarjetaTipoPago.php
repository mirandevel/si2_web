<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarjetaTipoPago extends Model
{
    protected $table='tarjeta_tipo_pago';
    use HasFactory;
    protected $fillable=[
        'tarjeta_id',
        'tipo_pagos_id'
    ];
}
