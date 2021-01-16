<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'url_imagen',
        'url_3d',
        'calificacion',
        'cantidad',
        'empresa_id',
        'marca_id',
        'garantia_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
