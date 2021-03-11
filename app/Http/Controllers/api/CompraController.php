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
    public $detalles;
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
            'tipo_pago_id'=>$request['tipo_pago'],
        ]);
        $i=0;
        foreach ($request['detalles'] as $item){
            $producto=Producto::findOrFail($item['id']);
            $producto->cantidad=$producto->cantidad-$item['cantidadCompra'];
            $producto->save();


            $promocion_id=$item['promocion_id'];
            if($promocion_id==0){
                $promocion_id=null;
            }
            Detalle::create([
                'factura_id'=>$factura->id,
                'producto_id'=>$producto->id,
                'cantidad'=>$item['cantidadCompra'],
                'precio'=>$item['precio'],
                'estado'=>'p',
                'promocion_id'=>$promocion_id,
                'comision_id'=>1,
            ]);
            $this->detalles[$i]['nombre']=$producto->nombre;
            $this->detalles[$i]['cantidad']=$item['cantidadCompra'];
            $this->detalles[$i]['precio']=$item['precio'];
            $i=$i+1;
        }
        Carrito::destroy($request['carrito_id']);
        $this->sendEmail($this->detalles,$factura,$request->user()->email);
        return response()->json(['status_code'=>$total,'message'=>$precio]);
    }

    public function sendEmail($detalles,$factura,$email)
    {
        $details = [
            'title' => 'Confirmar correo electrónico',
            'body' => 'This is for testing email using smtp'
        ];
        \Illuminate\Support\Facades\Mail::to($email)->send(new \App\Mail\MailFactura($detalles,$factura));
        //return response()->json(['email'=>'ok']);
    }
}
