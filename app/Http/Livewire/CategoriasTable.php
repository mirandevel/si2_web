<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriasTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina;
    public $nombre;

//    protected $rules = [
//        'nombre' => 'required|string|between:3,30',
//    ];

    public function mount()
    {
        $this->cantidadDeItemsPorPagina = 5;
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
        $this->reset(['nombre',]);
    }

    public function render()
    {
        return view('livewire.categorias-table', [
            'categorias' => Categoria::select('id', 'nombre')
                ->orderBy('categorias.id', 'asc')
                ->paginate($this->cantidadDeItemsPorPagina)
        ]);
//            ->layout('layouts.app', ['header' => 'Post Compoent Page']); //para resolver el error del header
    }
}
