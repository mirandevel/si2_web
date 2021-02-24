<?php

namespace App\Http\Livewire\Adm;

use App\Models\Bitacora;
use App\Models\Empresa;
use App\Models\Marca;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Empresas extends Component
{

    use WithPagination;

    public $cantidadDeItemsPorPagina;
    public $idDeCategoriaSeleccionada;
    public $nombre;
    public $nit;
    public $nombreDeCategoriaABuscar;

    public function mount()
    {
        $this->cantidadDeItemsPorPagina = 5;
    }
    public function resetarValores()
    {
        $this->reset(['nombre', 'nit','idDeCategoriaSeleccionada',]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'nombre' => 'string|between:3,30|unique:App\Models\Empresa,nombre',
            'nit' => 'integer',
        ]);
    }

    public function storeCategoria()
    {
        $datosValidados = $this->validate([
            'nombre' => 'required|string|between:3,30|unique:App\Models\Empresa,nombre',
            'nit' => 'required|integer|unique:App\Models\Empresa,nit',
        ]);

       /* Marca::create([
            'nombre' => $this->nombre
        ]);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Creó una marca',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);*/

        $this->resetarValores();
    }

    public function cargarDatosDelFormularioEdit($id, $nombre, $nit)
    {
        $this->idDeCategoriaSeleccionada = $id;
        $this->nombre = $nombre;
        $this->nit = $nit;
    }

    public function editCategoria()
    {
        $datosValidados = $this->validate([
            'nombre' => 'required|string|between:3,30',
            'nit' => 'required|integer',
        ]);

        $categoriaAEditar = Empresa::findOrFail($this->idDeCategoriaSeleccionada);
        $categoriaAEditar->nombre = $this->nombre;
        $categoriaAEditar->nit = $this->nit;
        $categoriaAEditar->save();
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Editó una empresa',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);

        $this->resetarValores();
    }

    public function eliminarCategoria()
    {
        Empresa::destroy($this->idDeCategoriaSeleccionada);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Eliminó una empresa',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }


    public function render()
    {
        $empresas=Empresa::where('nombre', 'LIKE', '%'.$this->nombreDeCategoriaABuscar.'%')->paginate(5);
        return view('livewire.adm.empresas',compact('empresas'))->layout('layouts.adm');
    }
}
