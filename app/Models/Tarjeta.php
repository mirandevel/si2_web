<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $table = 'tarjetas';

    protected $fillable = [
        'numero',
        'cvv',
        'fecha',
        'usuario_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
