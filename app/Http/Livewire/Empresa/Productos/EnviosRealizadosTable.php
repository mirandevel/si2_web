<?php

namespace App\Http\Livewire\Empresa\Productos;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EnviosRealizadosTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina;
    public $nombreDeProductoABuscar;

    public function mount()
    {
        $this->cantidadDeItemsPorPagina = 5;
    }

    public function render()
    {
        // p = pendiente, e = enviado
        $enviosRealizados = DB::table('detalles')
            ->select('productos.id', 'productos.nombre', 'detalles.cantidad', 'detalles.precio')
            ->where('detalles.estado', '=', 'e')
            ->where('productos.nombre', 'LIKE', '%'.$this->nombreDeProductoABuscar.'%')
            ->join('productos', 'detalles.producto_id', '=', 'productos.id')
            ->paginate($this->cantidadDeItemsPorPagina);

        return view('livewire.empresa.productos.envios-realizados-table', [
            'productos' => $enviosRealizados,
        ]);
    }
}
