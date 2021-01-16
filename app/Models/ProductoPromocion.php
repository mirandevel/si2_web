<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPromocion extends Model
{
    use HasFactory;

    protected $table = 'producto_promociones';
    protected $primaryKey = [
        'producto_id',
        'promocion_id'
    ];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;

    protected $fillable = [
        'producto_id',
        'promocion_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
