<?php

namespace App\Http\Livewire\Empresa\Productos;

//use App\Models\Empresa;
//use App\Models\Garantia;
//use App\Models\Marca;
use App\Models\Empresa;
use App\Models\Garantia;
use App\Models\Marca;
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

    /*para el producto*/
    public $nombre;
    public $descripcion;
    public $precio;
    public $calificacion;
    public $cantidad;
    public $empresa_id;
    public $marca_id;
    public $garantia_id;

    public function resetarValores()
    {
        $this->reset([
            'idDeProductoSeleccionado',
            'nombre',
            'descripcion',
            'precio',
            'calificacion',
            'cantidad',
            'empresa_id',
            'marca_id',
            'garantia_id',
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'nombre' => 'string|between:3,30',
            'descripcion' => 'string|min:5',
            'precio' => 'numeric|min:1',
            'calificacion' => 'numeric|between:1,5',
            'cantidad' => 'numeric|min:0',
            'empresa_id' => 'numeric|exists:App\Models\Empresa,id',
            'marca_id' => 'numeric|exists:App\Models\Marca,id',
            'garantia_id' => 'numeric|exists:App\Models\Garantia,id',
        ]);
    }

    public function cargarDatos($idProducto)
    {
        $this->idDeProductoSeleccionado = $idProducto;
        $producto = Producto::findOrFail($this->idDeProductoSeleccionado);
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->calificacion = $producto->calificacion;
        $this->cantidad = $producto->cantidad;
        $this->empresa_id = $producto->empresa_id;
        $this->marca_id = $producto->marca_id;
        $this->garantia_id = $producto->garantia_id;
    }

    public function editProducto()
    {

    }

    public function storeProductostoreProducto()
    {
        $datosValidados = $this->validate([
            'nombre' => 'required|string|between:3,30',
            'descripcion' => 'required|string|min:5',
            'precio' => 'required|numeric|min:1',
            'calificacion' => 'required|numeric|between:1,5',
            'cantidad' => 'required|numeric|min:0',
            'empresa_id' => 'required|numeric|exists:App\Models\Empresa,id',
            'marca_id' => 'required|numeric|exists:App\Models\Marca,id',
            'garantia_id' => 'required|numeric|exists:App\Models\Garantia,id',
        ]);

        Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-silla1.jpg', //poner url
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-silla1.obj',  //poner url
            'calificacion' => $this->calificacion,
            'cantidad' => $this->cantidad,
            'empresa_id' => $this->empresa_id,
            'marca_id' => $this->marca_id,
            'garantia_id' => $this->garantia_id,
        ]);

        $this->resetarValores();
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
            'empresas' => Empresa::select('id', 'nombre')
                ->get(),
            'marcas' => Marca::select('id', 'nombre')
                ->get(),
            'garantias' => Garantia::select('id', 'tiempo')
                ->get(),
        ]);
    }
}
