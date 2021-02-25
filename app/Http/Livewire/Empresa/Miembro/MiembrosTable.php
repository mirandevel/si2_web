<?php

namespace App\Http\Livewire\Empresa\Miembro;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MiembrosTable extends Component
{
    public $estado;
    public $cantidadDeItemsPorPagina;
    public $nombreDeMiembroABuscar;
    public $nombreDeMiembroAnadir;

    public function mount()
    {
        $this->estado = 1;
        $this->cantidadDeItemsPorPagina = 6;
        $this->nombreDeMiembroABuscar = '';
    }

    public function resetarValores()
    {
        $this->reset([
            'nombreDeMiembroAnadir',
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'nombreDeMiembroAnadir' => 'required|string',
        ]);
    }

    public function esAdministrador()
    {
        return DB::table('rol_users')
            ->where('rol_id', '=', 1)
            ->where('user_id', '=', Auth::user()->id)
            ->count() == 1;
    }

    public function render()
    {
        $miembros = null;
        if ($this->esAdministrador())
        {
            $idDeMiembros = DB::table('empresa_usuarios')
                ->select('usuario_id')
                ->distinct()->get()->pluck('usuario_id')->toArray();

            $miembros = DB::table('users')
                ->select('users.name as nombre', 'users.created_at as fecha_inicio', 'empresa_usuarios.estado', 'users.email as correo')
                ->join('empresa_usuarios', 'users.id', '=', 'empresa_usuarios.usuario_id')
                ->whereIn('users.id', $idDeMiembros)
                ->where('empresa_usuarios.estado', '=', $this->estado)
                ->where('users.name', 'LIKE', '%'.$this->nombreDeMiembroABuscar.'%')
                ->paginate($this->cantidadDeItemsPorPagina);
        } else {
//            $idDeEmpresa = DB::table('empresa_usuarios')
//                ->select('empresa_id')
//
//            $miembros = DB::table('empresa_usuarios')
//                ->select('usuario_id')->get();
        }
        return view('livewire.empresa.miembro.miembros-table', [
            'miembros' => $miembros,
        ]);
    }
}
