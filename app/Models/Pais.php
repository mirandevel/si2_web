<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';

    protected $fillable = ['nombre'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'pais_id', 'id');
    }
}
