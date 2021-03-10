<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'activo', 'ciudad_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * accessor, se lo llama con: Auth::user()->es_administrador
     * se usa para saber el el usuario actual es o no administrador
     * @return bool
     */
    public function getEsAdministradorAttribute()
    {
        return DB::table('rol_users')
                ->where('rol_id', '=', 1)
                ->where('user_id', '=', Auth::user()->id)
                ->count() == 1;
    }

    /**
     * mutator para definir al empresa actual con la que se esta trabajando
     * @param $nombreEmpresa
     */
    public function setIdEmpresaAttribute($nombreEmpresa)
    {
        $idEmpresa = DB::table('empresas')
            ->where('nombre', '=', $nombreEmpresa)
            ->value('id');
        $this->attributes['id_empresa'] = $idEmpresa;
    }

    /**
     * accessor, se lo llama con: Auth::user()->id_empresa
     * se lo usa para saber cual empresa se esta trabajando actualmente
     * @return mixed
     */
    public function getIdEmpresaAttribute()
    {
        return $this->attributes['id_empresa'];
    }
}
