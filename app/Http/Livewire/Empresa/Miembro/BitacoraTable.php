<?php

namespace App\Http\Livewire\Empresa\Miembro;

use App\Models\Bitacora;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class BitacoraTable extends Component
{
    use WithPagination;

    public function render()
    {
        $bitacoras = DB::table('bitacoras')
            ->select('users.name', 'bitacoras.descripcion', 'bitacoras.fecha', 'bitacoras.hora')
            ->where('empresa_usuarios.empresa_id', '=', session('empresa_id'))
            ->join('users', 'bitacoras.usuario_id', '=', 'users.id')
            ->join('empresa_usuarios', 'bitacoras.usuario_id', '=','empresa_usuarios.usuario_id')
            ->orderBy('bitacoras.id', 'asc')
            ->paginate(8);
        return view('livewire.empresa.miembro.bitacora-table', [
            'bitacoras' => $bitacoras
        ]);
    }
}
