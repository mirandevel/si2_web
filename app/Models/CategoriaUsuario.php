<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaUsuario extends Model
{
    use HasFactory;

    protected $table = 'categoria_usuarios';
    protected $primaryKey = ['categoria_id', 'user_id'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;

    protected $fillable = ['categoria_id', 'user_id'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
