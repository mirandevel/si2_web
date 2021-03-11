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
            ->select('detalles.factura_id', 'productos.id', 'productos.nombre', 'detalles.cantidad', 'detalles.precio', 'facturas.ubicacion', 'facturas.telefono')
            ->where('detalles.estado', '=', 'e')
            ->where('productos.empresa_id', '=', session('empresa_id'))
            ->where('productos.nombre', 'LIKE', '%'.$this->nombreDeProductoABuscar.'%')
            ->join('productos', 'detalles.producto_id', '=', 'productos.id')
            ->join('facturas', 'detalles.factura_id', '=', 'facturas.id')
            ->paginate($this->cantidadDeItemsPorPagina);

        return view('livewire.empresa.productos.envios-realizados-table', [
            'productos' => $enviosRealizados,
        ]);
    }
}
