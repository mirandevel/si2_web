<?php

namespace App\Http\Livewire\Empresa\Productos;

use App\Models\Bitacora;
use App\Models\Empresa;
use App\Models\Garantia;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\ProductoPromocion;
use App\Models\Promocion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosTable extends Component
{
    use WithPagination;

    public $cantidadDeItemsPorPagina = 5;
    public $nombreDeProductoABuscar;
    public $idDeProductoSeleccionado;

    /*para el producto*/
    public $nombre;
    public $descripcion;
    public $precio;
    public $calificacion;
    public $cantidad;
    public $marca_id;
    public $garantia_id;
    public $photoTemp='https://customercare.igloosoftware.com/.api2/api/v1/communities/10068556/previews/thumbnails/4fc20722-5368-e911-80d5-b82a72db46f2?width=680&height=680&crop=False';
    public $promocion;

    protected $listeners=[
        'registrar',
        'temp'
    ];
    public function temp($tempURL){
        $this->photoTemp=$tempURL;
    }
    public function resetarValores()
    {
        $this->reset([
            'idDeProductoSeleccionado',
            'nombre',
            'descripcion',
            'precio',
            'promocion',
            'calificacion',
            'cantidad',
            'promocion',
            'marca_id',
            'garantia_id',
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'nombre' => 'required|string|between:3,30',
            'descripcion' => 'required|string|min:5',
            'precio' => 'required|numeric|min:1',
            'promocion' => 'required|numeric',
            'calificacion' => 'required|numeric|between:1,5',
            'cantidad' => 'required|numeric|min:1',
            'marca_id' => 'required|numeric|exists:App\Models\Marca,id',
            'garantia_id' => 'required|numeric|exists:App\Models\Garantia,id',
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
        $this->marca_id = $producto->marca_id;
        $this->garantia_id = $producto->garantia_id;
    }

    public function cargarDatosPorDefecto()
    {
        $this->garantia_id = 1;
        $this->marca_id = 1;
        $this->calificacion = 1;
    }

    public function editProducto()
    {
        $productoAEditar = Producto::findOrFail($this->idDeProductoSeleccionado);
        $productoAEditar->nombre = $this->nombre;
        $productoAEditar->descripcion = $this->descripcion;
        $productoAEditar->precio = $this->precio;
        $productoAEditar->url_imagen = 'gs://si-2-5abca.appspot.com/products-images/image-silla1.jpg'; //todo cambiar
        $productoAEditar->url_3d = 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-silla1.obj'; //todo cambiar
        $productoAEditar->calificacion = $this->calificacion;
        $productoAEditar->cantidad = $this->cantidad;
        $productoAEditar->marca_id = $this->marca_id;
        $productoAEditar->garantia_id = $this->garantia_id;
        $productoAEditar->save();

        if ($this->promocion != 0)
        {
            ProductoPromocion::create([
                'producto_id' => $this->idDeProductoSeleccionado,
                'promocion_id' => $this->promocion,
            ]);
        }

        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Editó un producto',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);

        $this->resetarValores();
    }

    public function storeProducto()
    {
        Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'url_imagen' => 'gs://si-2-5abca.appspot.com/products-images/image-silla1.jpg', //poner url
            'url_3d' => 'gs://si-2-5abca.appspot.com/3d-models-obj/3d-model-silla1.obj',  //poner url
            'calificacion' => $this->calificacion,
            'cantidad' => $this->cantidad,
            'empresa_id' => session('empresa_id'),
            'marca_id' => $this->marca_id,
            'garantia_id' => $this->garantia_id,
        ]);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Creó un producto',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }

    public function eliminarProducto()
    {
        Producto::destroy($this->idDeProductoSeleccionado);
        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Eliminó un producto',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }

    public function render()
    {
        return view('livewire.empresa.productos.productos-table', [
            'productos' => Producto::select('productos.id', 'productos.nombre','productos.url_imagen', 'productos.cantidad', 'productos.calificacion','productos.precio', 'empresas.nombre as empresa')
                ->join('empresas', 'empresas.id', '=', 'productos.empresa_id')
                ->where('productos.empresa_id', '=', session('empresa_id'))
                ->where('productos.nombre', 'LIKE', '%'.$this->nombreDeProductoABuscar.'%')
                ->orderBy('productos.id', 'asc')
                ->paginate($this->cantidadDeItemsPorPagina),
            'empresas' => Empresa::select('id', 'nombre')
                ->get(),
            'marcas' => Marca::select('id', 'nombre')
                ->get(),
            'garantias' => Garantia::select('id', 'tiempo')
                ->get(),
            'promociones' => Promocion::where('id', 'nombre')
                ->get(),
        ]);
    }
}
