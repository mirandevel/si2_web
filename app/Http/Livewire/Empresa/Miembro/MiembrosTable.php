<?php

namespace App\Http\Livewire\Empresa\Miembro;

use App\Models\EmpresaUsuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MiembrosTable extends Component
{
    public $estado;
    public $cantidadDeItemsPorPagina;
    public $nombreDeMiembroABuscar;
    public $nombreDeMiembroAnadir; //correo xD

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

    public function storeMiembro()
    {
        if (!$this->esAdministrador())
        {
            $idEmpresa = DB::table('empresa_usuarios')
                ->select('empresa_id')
                ->where('usuario_id', '=', Auth::user()->id)
                ->get()->pluck('empresa_id')->toArray();
            $idEmpresa = $idEmpresa[0];

            $idDeMiembroAAnadir = DB::table('users')
                ->select('id')
                ->where('email', '=', $this->nombreDeMiembroAnadir)
                ->get()->pluck('id')->toArray();

            if (!empty($idDeMiembroAAnadir))
            {
                try {
                    EmpresaUsuario::create([
                        'usuario_id' => $idDeMiembroAAnadir[0],
                        'empresa_id' => $idEmpresa,
                        'estado' => 1,
                    ]);
                    $this->dispatchBrowserEvent('respuesta', ['admin' => false, 'valor' => 'usuario añadido']);
                } catch (\Exception $exception) {
                    $this->dispatchBrowserEvent('respuesta', ['admin' => false, 'valor' => 'ocurrio un error']);
                }

            } else {
                $this->dispatchBrowserEvent('respuesta', ['admin' => false, 'valor' => 'no existe un usuario con ese correo']);
            }
        } else {
            $this->dispatchBrowserEvent('respuesta', ['admin' => true]);
        }
        $this->resetarValores();
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

        } else {
            $idEmpresa = DB::table('empresa_usuarios')
                ->select('empresa_id')
                ->where('usuario_id', '=', Auth::user()->id)
                ->get()->pluck('empresa_id')->toArray();

            $idDeMiembros = DB::table('empresa_usuarios')
                ->select('usuario_id')
                ->whereIn('empresa_id', $idEmpresa)
                ->distinct()->get()->pluck('usuario_id')->toArray();

        }

        $miembros = DB::table('users')
            ->select('users.name as nombre', 'users.created_at as fecha_inicio', 'empresa_usuarios.estado', 'users.email as correo')
            ->join('empresa_usuarios', 'users.id', '=', 'empresa_usuarios.usuario_id')
            ->whereIn('users.id', $idDeMiembros)
            ->where('empresa_usuarios.estado', '=', $this->estado)
            ->where('users.name', 'LIKE', '%'.$this->nombreDeMiembroABuscar.'%')
            ->paginate($this->cantidadDeItemsPorPagina);

        return view('livewire.empresa.miembro.miembros-table', [
            'miembros' => $miembros,
        ]);
    }
}
