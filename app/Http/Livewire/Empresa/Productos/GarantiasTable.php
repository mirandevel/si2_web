<?php

namespace App\Http\Livewire\Empresa\Productos;

use App\Models\Bitacora;
use App\Models\Garantia;
use App\Models\Marca;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class GarantiasTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina;
    public $idDeCategoriaSeleccionada;
    public $tiempo;
    public $nombreDeCategoriaABuscar;

    public function mount()
    {
        $this->cantidadDeItemsPorPagina = 5;
    }
    public function resetarValores()
    {
        $this->reset(['tiempo', 'idDeCategoriaSeleccionada',]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'tiempo' => 'integer|unique:App\Models\Garantia,tiempo',
        ]);
    }

    public function storeCategoria()
    {
        $datosValidados = $this->validate([
            'tiempo' => 'required|integer|unique:App\Models\Garantia,tiempo',
        ]);

        Garantia::create([
            'tiempo' => $this->tiempo
        ]);

        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Creó una garantia',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);

        $this->resetarValores();
    }

    public function cargarDatosDelFormularioEdit($id, $tiempo)
    {
        $this->idDeCategoriaSeleccionada = $id;
        $this->tiempo = $tiempo;
    }

    public function editCategoria()
    {
        $datosValidados = $this->validate([
            'tiempo' => 'required|integer|unique:App\Models\Garantia,tiempo',
        ]);

        $categoriaAEditar = Garantia::findOrFail($this->idDeCategoriaSeleccionada);
        $categoriaAEditar->tiempo = $this->tiempo;
        $categoriaAEditar->save();
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Editó una garantia',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }

    public function eliminarCategoria()
    {
        Garantia::destroy($this->idDeCategoriaSeleccionada);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Eliminó una garantia',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }
    public function render()
    {

        return view('livewire.empresa.productos.garantias-table', [
            'categorias' => Garantia::select('id', 'tiempo')
                ->where('garantias.tiempo', 'LIKE', '%'.$this->nombreDeCategoriaABuscar.'%')
                ->orderBy('garantias.id', 'asc')
                ->paginate($this->cantidadDeItemsPorPagina)
        ]);
    }
}
