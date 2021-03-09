<?php

namespace App\Http\Livewire\Adm;

use App\Models\Bitacora;
use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{


    use WithPagination;

    public $cantidadDeItemsPorPagina;
    public $idDeCategoriaSeleccionada;
    public $nombre;
    public $nombreDeCategoriaABuscar;

    public function mount()
    {
        $this->cantidadDeItemsPorPagina = 5;
    }
    public function resetarValores()
    {
        $this->reset(['nombre','idDeCategoriaSeleccionada',]);
    }

    public function eliminarCategoria()
    {
        User::destroy($this->idDeCategoriaSeleccionada);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Eliminó un usuario',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }
    public function deshabilitar()
    {
        $user = User::findOrFail($this->idDeCategoriaSeleccionada);
        $user->activo=!$user->activo;
        $user->save();
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Deshabilitó un usuario',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }
    public function render()
    {
        $users=User::where('name', 'LIKE', '%'.$this->nombreDeCategoriaABuscar.'%')->paginate(5);
        return view('livewire.adm.usuarios',compact('users'))->layout('layouts.adm');
    }
}
