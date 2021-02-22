<?php

namespace App\Http\Livewire\Empresa\Miembro;

use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;

class BitacoraTable extends Component
{
    use WithPagination;

    public function render()
    {
        $bitacoras=Bitacora::paginate(5);
        return view('livewire.empresa.miembro.bitacora-table',compact('bitacoras'));
    }
}
