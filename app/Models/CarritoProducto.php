<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoProducto extends Model
{
    use HasFactory;

    protected $table = 'carrito_productos';
    protected $primaryKey = ['carrito_id', 'producto_id'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;

    protected $fillable = ['carrito_id', 'producto_id', 'fecha'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
