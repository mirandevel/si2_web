<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriasTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina;

    public function mount()
    {
        $this->cantidadDeItemsPorPagina = 5;
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
