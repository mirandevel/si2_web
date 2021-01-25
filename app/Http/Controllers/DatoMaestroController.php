<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\FcmToken;
use App\Models\Pais;
use Illuminate\Http\Request;

class DatoMaestroController extends Controller
{
    public function datalogin()
    {
        $paises = Pais::all();
        $paises->load('ciudades');
        return $paises;
    }

    public function storetoken(Request $request)
    {
        $user=$request->user();
        $fcmToken=FcmToken::create([
            'token' => $request['token'],
            'usuario_id' => $user->id,
        ]);
        return $fcmToken;
    }

    public function registrarbitacora(Request $request)
    {
        return Bitacora::create([
            'descripcion' => $request['descripcion'],
            'usuario_id' => $request['usuario_id']
        ]);
    }
}
