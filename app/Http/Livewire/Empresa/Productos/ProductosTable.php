<?php

namespace App\Http\Livewire\Empresa\Productos;

//use App\Models\Empresa;
//use App\Models\Garantia;
//use App\Models\Marca;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina = 5;
//    public $nombreDeProductoABuscar;
    public $idDeProductoSeleccionado;
//    public $empresas;
//    public $marcas;
//    public $garantias;

    public function resetarValores()
    {
        $this->reset(['idDeProductoSeleccionado',]);
    }

    public function eliminarProducto()
    {
        Producto::destroy($this->idDeProductoSeleccionado);
        $this->resetarValores();
    }

    public function render()
    {
        return view('livewire.empresa.productos.productos-table', [
            'productos' => Producto::select('productos.id', 'productos.nombre', 'productos.cantidad', 'productos.precio', 'empresas.nombre as empresa')
                ->join('empresas', 'empresas.id', '=', 'productos.empresa_id')
                ->orderBy('productos.id', 'asc')
                ->paginate($this->cantidadDeItemsPorPagina),
        ]);
    }
}
