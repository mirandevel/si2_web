<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    use HasFactory;

    protected $table = 'comisiones';

    protected $fillable = ['porcentaje'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
