<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;

    protected $table = 'categoria_productos';
    protected $primaryKey = ['categoria_id', 'producto_id'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;

    protected $fillable = ['categoria_id', 'producto_id'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
