<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garantia extends Model
{
    use HasFactory;

    protected $table = 'garantias';

    protected $fillable = ['tiempo'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
