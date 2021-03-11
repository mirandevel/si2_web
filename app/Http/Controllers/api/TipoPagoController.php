<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta;
use App\Models\TipoPago;
use Illuminate\Http\Request;

class TipoPagoController extends Controller
{
    public function tiposDePago()
    {
        return TipoPago::all();

    }

    public function obtenerTarjeta(Request $request){
        return Tarjeta::where('usuario_id',$request->user()->id)->first();
    }

    public function registrarTarjeta(Request $request)
    {
       return Tarjeta::create([
            'numero' => $request['numero'],
            'cvv' => $request['cvv'],
            'fecha' => $request['fecha'],
            'usuario_id' => $request->user()->id,
        ]);
    }
}
