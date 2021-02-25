<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Detalle;
use App\Models\Factura;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toCanonicalExtendedJSON;

class CompraController extends Controller
{
    public function compra(){

       // $ubi=$request['direccion'];
        return 'hola';
        /*$total=0;
        $precio=0;
        foreach ($request['detalles'] as $item){
            $total=$total+$item->cantidadCompra;
            $precio=$total+$item->precio;
        }

        $user=$request->user()->id;
        $factura=Factura::create([
            'total'=>$precio,
            'ubicacion'=>$request['ubicacion'],
            'telefono'=>$request['telefono'],
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'usuario_id'=>$user,
            'tipo_pago_id'=>null,
        ]);

        foreach ($request['detalles'] as $item){
            $total=$total+$item->cantidadCompra;
            $producto=Producto::find($item->id);
            $producto->cantidad=$producto->cantidad-$item->cantidadCompra;
            $producto->save();

            Detalle::create([
                'factura_id'=>$factura->id,
                'producto_id'=>$producto->id,
                'cantidad'=>$item->cantidadCompra,
                'estado'=>'p',
                'precio'=>$item->precio,
                'promocion_id'=>1,
                'comision_id'=>1,
            ]);
        }*/
    }
}
