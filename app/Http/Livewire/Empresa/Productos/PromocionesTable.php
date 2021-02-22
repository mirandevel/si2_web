<?php

namespace App\Http\Livewire\Empresa\Productos;

use App\Models\Marca;
use App\Models\Promocion;
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

        $this->resetarValores();
    }

    public function eliminarCategoria()
    {
        Promocion::destroy($this->idDeCategoriaSeleccionada);
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
