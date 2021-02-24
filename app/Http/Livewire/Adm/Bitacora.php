<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;
use Livewire\WithPagination;

class Bitacora extends Component
{
    use WithPagination;

    public function render()
    {
        $bitacoras= \App\Models\Bitacora::paginate(5);
        return view('livewire.adm.bitacora',compact('bitacoras'))->layout('layouts.adm');
    }
}
