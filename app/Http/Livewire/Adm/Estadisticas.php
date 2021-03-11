<?php

namespace App\Http\Livewire\Adm;

use App\Models\Factura;
use App\Models\Producto;
use Carbon\Carbon;
use Livewire\Component;

class Estadisticas extends Component
{


    public function render()
    {
        return view('livewire.adm.estadisticas')->layout('layouts.adm');
    }
}
