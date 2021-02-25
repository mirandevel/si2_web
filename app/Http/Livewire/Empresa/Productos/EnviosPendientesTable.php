<?php

namespace App\Http\Livewire\Empresa\Productos;

use App\Models\Detalle;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EnviosPendientesTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina;
    public $nombreDeProductoABuscar;

    public function mount()
    {
        $this->cantidadDeItemsPorPagina = 5;
    }

    public function enviarPedido($idDeProducto)
    {
        DB::table('detalles')
            ->where('producto_id', '=', $idDeProducto)
            ->update(['estado' => 'e']);
    }

    public function render()
    {
        // p = pendiente, e = enviado
        $enviosPendientes = DB::table('detalles')
            ->select('detalles.factura_id', 'productos.id', 'productos.nombre', 'detalles.cantidad', 'detalles.precio')
            ->where('detalles.estado', '=', 'p')
            ->where('productos.nombre', 'LIKE', '%'.$this->nombreDeProductoABuscar.'%')
            ->join('productos', 'detalles.producto_id', '=', 'productos.id')
            ->paginate($this->cantidadDeItemsPorPagina);

        return view('livewire.empresa.productos.envios-pendientes-table', [
            'productos' => $enviosPendientes
        ]);
    }
}
