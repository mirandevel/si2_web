<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\CarritoProducto;
use App\Models\Categoria;
use App\Models\CategoriaProducto;
use App\Models\Empresa;
use App\Models\Garantia;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Promocion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class ProductoController extends Controller
{
    public function datosExtraDeProducto(Request $request)
    {
        $userID = $request->user()->id;
        $productoID = $request["productoID"];
        $marca = Marca::select('marcas.*')
            ->join('productos', 'marcas.id', '=', 'productos.marca_id')
            ->where('productos.id', '=', $productoID)
            ->first();
        $garantia = Garantia::select('garantias.*')
            ->join('productos', 'garantias.id', '=', 'productos.garantia_id')
            ->where('productos.id', '=', $productoID)
            ->first();
        $promocion = Promocion::select('promociones.*')
            ->join('producto_promociones', 'promociones.id', '=', 'producto_promociones.promocion_id')
            ->where('producto_promociones.producto_id', '=', $productoID)
            ->first();
        $carritoID = Carrito::select('carritos.id')
            ->where('carritos.usuario_id', '=', $userID)
            ->first();
        $agregado = ['agregado' => true];
        $empresa = Empresa::select('empresas.*')
            ->join('productos','empresas.id','=','productos.empresa_id')
            ->where('productos.id','=',$productoID)
            ->first();

        if ($carritoID == null) {
            $agregado['agregado'] = false;
        } else {
            $pr = CarritoProducto::select('carrito_productos.producto_id')
                ->where('carrito_productos.carrito_id', '=', $carritoID)
                ->where('carrito_productos.producto_id', '=', $productoID)
                ->get();

            if ($pr == null) {
                $agregado['agregado'] = false;
            }
        }
        //aqui
       //return $pr;
        return ['marca' => $marca, 'promocion' => $promocion, 'garantia' => $garantia, 'agregado' => $agregado,'empresa'=>$empresa];
    }

    public function productoAlCarrito(Request $request)
    {

        $userID = $request->user()->id;
        $productoID = $request["productoID"];
        $carritoID = Carrito::select('carritos.id')
            ->where('carritos.usuario_id', '=', $userID)
            ->first();
        if ($carritoID == null) {

            Carrito::create([
                'usuario_id' => $userID,
                'created_at' => Carbon::now('America/La_Paz'),
                'updated_at' => Carbon::now('America/La_Paz')
            ]);
            $car = Carrito::select('carritos.id')
                ->where('carritos.usuario_id', '=', $userID)
                ->first();

            CarritoProducto::create([
                'carrito_id' => $car["id"],
                'producto_id' => $productoID,
                'fecha' => Carbon::now('America/La_Paz')->format('y-m-d'),
                'cantidad' => 1,
                'created_at' => Carbon::now('America/La_Paz'),
                'updated_at' => Carbon::now('America/La_Paz')
            ]);

        } else {
            CarritoProducto::create([
                'carrito_id' => $carritoID["id"],
                'producto_id' => $productoID,
                'fecha' => Carbon::now('America/La_Paz')->format('y-m-d'),
                'cantidad' => 1,
                'created_at' => Carbon::now('America/La_Paz'),
                'updated_at' => Carbon::now('America/La_Paz'),
            ]);
        }

        return $carritoID;
    }

    public function productosDeCarrito(Request $request)
    {
        $userID = $request->user()->id;
        $carritoID = Carrito::select('carritos.id')
            ->where('carritos.usuario_id', '=', $userID)
            ->first();
        if ($carritoID == null) {
            return null;
        }

        $productoCarrito = Producto::select('productos.id', 'productos.nombre', 'productos.descripcion',
            'productos.precio', 'productos.url_imagen', 'productos.url_3d', 'productos.calificacion',
            'productos.cantidad', 'productos.garantia_id' , 'marcas.nombre as nombreMarca',
            'carrito_productos.cantidad as cantidadCompra','promociones.descuento',
            'carrito_productos.carrito_id')
            ->join('carrito_productos', 'productos.id', '=', 'carrito_productos.producto_id')
            ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
            ->leftjoin('producto_promociones','productos.id','=','producto_promociones.producto_id')
            ->leftjoin('promociones','producto_promociones.promocion_id','=','promociones.id')
            ->where('carrito_productos.carrito_id', '=', $carritoID["id"])
            ->get();

        return $productoCarrito;

    }

    public function eliminarProducto(Request $request)
    {
        $userID = $request->user()->id;
        $productoID = $request["productoID"];
        $carritoID = Carrito::select('carritos.id')
            ->where('carritos.usuario_id', '=', $userID)
            ->first();
        CarritoProducto::where('carrito_id','=',$carritoID["id"])
            ->where('producto_id','=',$productoID)->delete();
        $bandera = 'true';
        return $bandera;

    }

    public function actualizarCompraProducto(Request $request)
    {   $userID = $request->user()->id;
        $productoID = $request["productoID"];
        $valor = $request["valor"];
        $carritoID = Carrito::select('carritos.id')
            ->where('carritos.usuario_id', '=', $userID)
            ->first();
        CarritoProducto::where('carrito_id','=',$carritoID["id"])
            ->where('producto_id','=',$productoID)
            ->increment('cantidad',$valor);
        return true;

    }

    public function buscarProductos(Request $request)
    {
        $nombre = $request["nombre"];

        $productos = Producto::select('productos.*')
            ->where('productos.nombre','like',"$nombre%")
            ->get();
        return $productos;
    }

    public function buscarProductosFiltrados(Request $request)
    {
        $fechaInicio = $request["fecha_inicio"];
        $fechaFin = $request["fecha fin"];
        $valorado = $request["valorado"];
        $vendido = $request["vendido"];

        if("$fechaInicio" != "fecha inicio"){

            return ['valor'=>true,'f'=>$fechaInicio];
        }else{
            return ['valor'=>false,'f'=>$fechaInicio];
        }
    }


}
