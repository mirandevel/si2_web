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
            'nombre' => 'string|between:3,30',
        ]);
    }

    public function storeCategoria()
    {
//        $datosValidados = $this->validate([
//            'nombre' => 'required|string|between:3,30',
//        ]);
//
//        Categoria::create([
//            'nombre' => $this->nombre
//        ]);
        return $this->redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.categorias-table', [
            'categorias' => Categoria::select('id', 'nombre')
                ->paginate($this->cantidadDeItemsPorPagina)
        ]);
//            ->layout('layouts.app', ['header' => 'Post Compoent Page']); //para resolver el error del header
    }
}
