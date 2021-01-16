<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaUsuario extends Model
{
    use HasFactory;

    protected $table = 'empresa_usuarios';
    protected $primaryKey = ['usuario_id', 'empresa_id'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;

    protected $fillable = ['usuario_id', 'empresa_id'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
