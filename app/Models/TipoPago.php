<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    use HasFactory;

    protected $table = 'tipo_pagos';

    protected $fillable = [
        'tipo',
        ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
