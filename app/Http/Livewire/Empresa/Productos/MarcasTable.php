<?php

namespace App\Http\Livewire\Empresa\Productos;

use App\Models\Categoria;
use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;

class MarcasTable extends Component
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
        $this->reset(['nombre', 'idDeCategoriaSeleccionada',]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'nombre' => 'string|between:3,30|unique:App\Models\Marca,nombre',
        ]);
    }

    public function storeCategoria()
    {
        $datosValidados = $this->validate([
            'nombre' => 'required|string|between:3,30|unique:App\Models\Marca,nombre',
        ]);

        Marca::create([
            'nombre' => $this->nombre
        ]);

        $this->resetarValores();
    }

    public function cargarDatosDelFormularioEdit($id, $nombre)
    {
        $this->idDeCategoriaSeleccionada = $id;
        $this->nombre = $nombre;
    }

    public function editCategoria()
    {
        $datosValidados = $this->validate([
            'nombre' => 'required|string|between:3,30|unique:App\Models\Marca,nombre',
        ]);

        $categoriaAEditar = Marca::findOrFail($this->idDeCategoriaSeleccionada);
        $categoriaAEditar->nombre = $this->nombre;
        $categoriaAEditar->save();

        $this->resetarValores();
    }

    public function eliminarCategoria()
    {
        Marca::destroy($this->idDeCategoriaSeleccionada);
        $this->resetarValores();
    }

    public function render()
    {
        return view('livewire.empresa.productos.marcas-table', [
            'categorias' => Marca::select('id', 'nombre')
                ->where('marcas.nombre', 'LIKE', '%'.$this->nombreDeCategoriaABuscar.'%')
                ->orderBy('marcas.id', 'asc')
                ->paginate($this->cantidadDeItemsPorPagina)
        ]);
    }
}
