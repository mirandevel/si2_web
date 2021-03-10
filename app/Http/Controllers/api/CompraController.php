<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\Comision;
use App\Models\Detalle;
use App\Models\Factura;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function compra(Request $request){

       // $ubi=$request['direccion'];
       // return $request;
        $total=0;
        $precio=0;
        foreach ($request['detalles'] as $item){
            $total=$total+$item['cantidadCompra'];
            $precio=$precio+$item['precio'];
        }

        $user=$request->user()->id;
        $factura=Factura::create([
            'estado'=>'p',
            'total'=>$precio,
            'ubicacion'=>$request['direccion'],
            'telefono'=>$request['telefono'],
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'usuario_id'=>$user,
        ]);

        foreach ($request['detalles'] as $item){
            $producto=Producto::findOrFail($item['id']);
            $producto->cantidad=$producto->cantidad-$item['cantidadCompra'];
            $producto->save();

            Detalle::create([
                'factura_id'=>$factura->id,
                'producto_id'=>$producto->id,
                'cantidad'=>$item['cantidadCompra'],
                'precio'=>$item['precio'],
                'estado'=>'p',
                'promocion_id'=>$item['promocion_id'],
                'comision_id'=>1,
            ]);
        }
        Carrito::destroy($request['carrito_id']);
        return response()->json(['status_code'=>$total,'message'=>$precio]);
    }
}
