<?php

namespace App\Http\Livewire;

use App\Models\Bitacora;
use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriasTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina;
    public $idDeCategoriaSeleccionada;
    public $nombre;
    public $nombreDeCategoriaABuscar;

//    protected $rules = [
//        'nombre' => 'required|string|between:3,30',
//    ];

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
            'nombre' => 'string|between:3,30|unique:App\Models\Categoria,nombre',
        ]);
    }

    public function storeCategoria()
    {
        $datosValidados = $this->validate([
            'nombre' => 'required|string|between:3,30|unique:App\Models\Categoria,nombre',
        ]);

        Categoria::create([
            'nombre' => $this->nombre
        ]);

        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Creó una categoria',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
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
            'nombre' => 'required|string|between:3,30|unique:App\Models\Categoria,nombre',
        ]);

        $categoriaAEditar = Categoria::findOrFail($this->idDeCategoriaSeleccionada);
        $categoriaAEditar->nombre = $this->nombre;
        $categoriaAEditar->save();
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Editó una categoria',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }

    public function eliminarCategoria()
    {
        Categoria::destroy($this->idDeCategoriaSeleccionada);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Eliminó una categoria',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }

    public function render()
    {
        return view('livewire.categorias-table', [
            'categorias' => Categoria::select('id', 'nombre')
                ->where('categorias.nombre', 'LIKE', '%'.$this->nombreDeCategoriaABuscar.'%')
                ->orderBy('categorias.id', 'asc')
                ->paginate($this->cantidadDeItemsPorPagina)
        ]);
//            ->layout('layouts.app', ['header' => 'Post Compoent Page']); //para resolver el error del header
    }
}
