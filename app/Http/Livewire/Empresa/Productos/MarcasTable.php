<?php

namespace App\Http\Livewire\Empresa\Productos;

use App\Models\Bitacora;
use App\Models\Marca;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MarcasTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina;
    public $idDeMarcaSeleccionada;
    public $nombre;
    public $nombreDeMarcaABuscar;

    public $productos;

    public function mount()
    {
        $this->cantidadDeItemsPorPagina = 5;
    }
    public function resetarValores()
    {
        $this->reset([
            'nombre',
            'idDeMarcaSeleccionada',
            'productos',
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'nombre' => 'string|between:3,30|unique:App\Models\Marca,nombre',
        ]);
    }

    public function storeCategoria()
    {
        $this->validate([
            'nombre' => 'required|string|between:3,30|unique:App\Models\Marca,nombre',
        ]);

        Marca::create([
            'nombre' => $this->nombre
        ]);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Creó una marca',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);

        $this->resetarValores();
    }

    public function cargarDatosDelFormularioEdit($id, $nombre)
    {
        $this->idDeMarcaSeleccionada = $id;
        $this->nombre = $nombre;
    }

    public function cargarDatosParaMostrar($id, $nombre)
    {
        $this->idDeMarcaSeleccionada = $id;
        $this->nombre = $nombre;
    }

    public function editCategoria()
    {
        $this->validate([
            'nombre' => 'required|string|between:3,30|unique:App\Models\Marca,nombre',
        ]);

        $categoriaAEditar = Marca::findOrFail($this->idDeMarcaSeleccionada);
        $categoriaAEditar->nombre = $this->nombre;
        $categoriaAEditar->save();
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Editó una marca',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);

        $this->resetarValores();
    }

    public function eliminarCategoria()
    {
        Marca::destroy($this->idDeMarcaSeleccionada);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Eliminó una marca',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }

    public function render()
    {
        return view('livewire.empresa.productos.marcas-table', [
            'marcas' => Marca::select('id', 'nombre')
                ->where('marcas.nombre', 'LIKE', '%'.$this->nombreDeMarcaABuscar.'%')
                ->orderBy('marcas.id', 'asc')
                ->paginate($this->cantidadDeItemsPorPagina),
            'productos' => Producto::select('productos.id', 'productos.nombre')
                ->where('productos.id', '=', $this->idDeMarcaSeleccionada)
                ->join('empresas', 'productos.id','=', 'empresas.id')
                ->paginate(5),
        ]);
    }
}
