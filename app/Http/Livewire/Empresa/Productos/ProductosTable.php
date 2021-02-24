<?php

namespace App\Http\Livewire\Empresa\Productos;

use App\Models\Bitacora;
use App\Models\Empresa;
use App\Models\Garantia;
use App\Models\Marca;
use App\Models\Producto;
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
    public $empresa_id;
    public $marca_id;
    public $garantia_id;
    public $photoTemp='https://customercare.igloosoftware.com/.api2/api/v1/communities/10068556/previews/thumbnails/4fc20722-5368-e911-80d5-b82a72db46f2?width=680&height=680&crop=False';
    public $temp3d;

    public $image_url=null;
    public $model_url=null;

    public $subido=0;
    protected $listeners=[
        'image',
        'model',
        'imageEdit',
        'modelEdit',
        'temp',
        'temp3d',
    ];
    public function image($url)
    {
        $this->image_url = $url;
        $this->subido=$this->subido+1;
        if($this->subido==2){
            $this->store();
        }
    }
    public function model($url){
        $this->model_url=$url;
        $this->subido=$this->subido+1;
        if($this->subido==2){
            $this->store();
        }
    }

    public function imageEdit($url){
        $this->image_url=$url;
        $this->subido=$this->subido+1;
        if($this->subido==2){
            $this->editProducto();
        }
    }
    public function modelEdit($url){
        $this->model_url=$url;
        $this->subido=$this->subido+1;
        if($this->subido==2){
            $this->editProducto();
        }
    }
    public function temp($tempURL){
        $this->photoTemp=$tempURL;
    }
    public function temp3d($tempURL){
        $this->temp3d=$tempURL;
    }
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
            'nombre' => 'required|string|between:3,30',
            'descripcion' => 'required|string|min:5',
            'precio' => 'required|numeric|min:1',
            'cantidad' => 'required|numeric|min:1',
            'empresa_id' => 'required|numeric|exists:App\Models\Empresa,id',
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
        $this->empresa_id = $producto->empresa_id;
        $this->marca_id = $producto->marca_id;
        $this->garantia_id = $producto->garantia_id;

        $this->photoTemp=$producto->url_imagen;
        $this->image_url=$producto->url_imagen;
        $this->model_url=$producto->url_3d;

    }

    public function cargarDatosPorDefecto()
    {
        $this->garantia_id = 1;
        $this->marca_id = 1;
        $this->empresa_id = 1;
        $this->calificacion = 1;
    }
    public function editProducto()
    {
        $productoAEditar = Producto::findOrFail($this->idDeProductoSeleccionado);
        $productoAEditar->nombre = $this->nombre;
        $productoAEditar->descripcion = $this->descripcion;
        $productoAEditar->precio = $this->precio;
        $productoAEditar->url_imagen = $this->image_url; //cambiar
        $productoAEditar->url_3d = $this->model_url; //cambiar
        //$productoAEditar->calificacion = $this->calificacion;
        $productoAEditar->cantidad = $this->cantidad;
        $productoAEditar->empresa_id = $this->empresa_id;
        $productoAEditar->marca_id = $this->marca_id;
        $productoAEditar->garantia_id = $this->garantia_id;
        $productoAEditar->save();

        $this->subido=0;

        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Editó un producto',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);
        $this->resetarValores();
    }

    public function store()
    {
        Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'url_imagen' => $this->image_url, //poner url
            'url_3d' => $this->model_url,  //poner url
            'calificacion' => 0,
            'cantidad' => $this->cantidad,
            'empresa_id' => $this->empresa_id,
            'marca_id' => $this->marca_id,
            'garantia_id' => $this->garantia_id,
        ]);
        $id = Auth::user()->id;
        Bitacora::create([
            'descripcion' => 'Creó un producto',
            'fecha' => Carbon::now('America/La_Paz')->toDateString(),
            'hora' => Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id' => $id,
        ]);

        $this->subido=0;

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
                ->where('productos.nombre', 'LIKE', '%'.$this->nombreDeProductoABuscar.'%')
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
