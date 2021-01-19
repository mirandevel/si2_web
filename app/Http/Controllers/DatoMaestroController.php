<?php

namespace App\Http\Controllers;

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
        $fcmToken=FcmToken::create([
            'token' => $request['token'],
            'usuario_id' => $request['usuario_id'],
        ]);
        return $fcmToken;
    }
}
