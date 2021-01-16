<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    use HasFactory;

    protected $table = 'rol_users';
    protected $primaryKey = ['rol_id',
        'user_id'
    ];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;

    protected $fillable = [
        'rol_id',
        'user_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
