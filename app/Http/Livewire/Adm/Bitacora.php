<?php

namespace App\Http\Livewire\Adm;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Bitacora extends Component
{
    use WithPagination;

    public function render()
    {
        $bitacoras = DB::table('bitacoras')
            ->select('users.name', 'bitacoras.descripcion', 'bitacoras.fecha', 'bitacoras.hora')
            ->join('users', 'bitacoras.usuario_id', '=', 'users.id')
            ->orderBy('bitacoras.id', 'asc')
            ->paginate(8);
        return view('livewire.adm.bitacora', [
            'bitacoras' => $bitacoras
        ])->layout('layouts.adm');
    }
}
