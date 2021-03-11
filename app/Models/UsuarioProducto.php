<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioProducto extends Model
{
    use HasFactory;
    protected $table = 'usuario_producto';
    protected $primaryKey = [
        'producto_id',
        'user_id'
    ];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;

    protected $fillable = [
        'producto_id',
        'user_id',
        'calificacion',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
