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
        $idDeMiembroAAnadir = DB::table('users')
            ->where('email', '=', $this->nombreDeMiembroAnadir)
            ->value('id');

        if (!empty($idDeMiembroAAnadir))
        {
            try {
                EmpresaUsuario::create([
                    'usuario_id' => $idDeMiembroAAnadir,
                    'empresa_id' => session('empresa_id'),
                    'estado' => 1,
                ]);
//                $this->dispatchBrowserEvent('respuesta', ['valor' => 'usuario añadido']);
                return $this->redirect(route('miembros'));
            } catch (\Exception $exception) {
                $this->dispatchBrowserEvent('respuesta', ['valor' => 'ocurrio un error']);
            }

        } else {
            $this->dispatchBrowserEvent('respuesta', ['valor' => 'no existe un usuario con ese correo']);
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
        $miembros = DB::table('users')
            ->select('users.name as nombre', 'users.created_at as fecha_inicio', 'empresa_usuarios.estado', 'users.email as correo')
            ->join('empresa_usuarios', 'users.id', '=', 'empresa_usuarios.usuario_id')
            ->where('empresa_usuarios.empresa_id', '=', session('empresa_id'))
            ->where('empresa_usuarios.estado', '=', $this->estado)
            ->where('users.name', 'LIKE', '%'.$this->nombreDeMiembroABuscar.'%')
            ->paginate($this->cantidadDeItemsPorPagina);

        return view('livewire.empresa.miembro.miembros-table', [
            'miembros' => $miembros,
        ]);
    }
}
