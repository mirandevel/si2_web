<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;

    protected $table = 'detalles';

    protected $primaryKey = ['factura_id', 'producto_id'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;

    protected $fillable = [
        'estado',
        'factura_id',
        'producto_id',
        'cantidad',
        'precio',
        'estado',
        'promocion_id',
        'comision_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

}
