<?php

namespace App\Http\Livewire\Empresa\Productos;

use App\Models\Bitacora;
use App\Models\Marca;
use App\Models\Promocion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PromocionesTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina;
    public $idDeCategoriaSeleccionada;
    public $nombre;
    public $descuento;
    public $descripcion;
    public $nombreDeCategoriaABuscar;

    public function mount()
    {
        $this->cantidadDeItemsPorPagina = 5;
    }
    public function resetarValores()
    {
        $this->reset(['nombre','descuento','descripcion', 'idDeCategoriaSeleccionada',]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'nombre' => 'string|between:3,30',
            'descuento' => 'required|integer',
            'descripcion' => 'required|string',
        ]);
    }

    public function storeCategoria()
    {
        $datosValidados = $this->validate([
            'nombre' => 'required|string|between:3,30|unique:App\Models\Promocion,nombre',
            'descuento' => 'required|integer',
            'descripcion' => 'required|string',
        ]);

        Promocion::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'descuento' => $this->descuento
        ]);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Creó una promoción',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }

    public function cargarDatosDelFormularioEdit($id, $nombre,$descripcion,$descuento)
    {
        $this->idDeCategoriaSeleccionada = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->descuento = $descuento;
    }

    public function editCategoria()
    {
        $datosValidados = $this->validate([
            'nombre' => 'required|string|between:3,30',
            'descuento' => 'required|integer',
            'descripcion' => 'required|string',
        ]);

        $categoriaAEditar = Promocion::findOrFail($this->idDeCategoriaSeleccionada);
        $categoriaAEditar->nombre = $this->nombre;
        $categoriaAEditar->descripcion = $this->descripcion;
        $categoriaAEditar->descuento = $this->descuento;
        $categoriaAEditar->save();
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Editó una promoción',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }

    public function eliminarCategoria()
    {
        Promocion::destroy($this->idDeCategoriaSeleccionada);

        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Eliminó una promoción',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);

        $this->resetarValores();
    }

    public function render()
    {

        return view('livewire.empresa.productos.promociones-table', [
            'categorias' => Promocion::select('id', 'nombre','descripcion','descuento')
                ->where('promociones.nombre', 'LIKE', '%'.$this->nombreDeCategoriaABuscar.'%')
                ->orderBy('promociones.id', 'asc')
                ->paginate($this->cantidadDeItemsPorPagina)
        ]);

    }
}
