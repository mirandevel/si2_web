<?php

namespace App\Http\Livewire\Empresa\Productos;

use Livewire\Component;
use Livewire\WithPagination;

class GarantiasTable extends Component
{

    public function render()
    {
        return view('livewire.empresa.productos.garantias-table');
    }
}
