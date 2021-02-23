<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Retrive Input
        $credentials = $request->only('email', 'password');
      //  $user = User::where('email', $request['email'])->first();
       // $rol='adm';
        //$rol='mie';
       // if ($user == null) {
       //     return 'nulo';
       // } else {
           // if ($rol=='adm'){
                if (Auth::attempt($credentials)) {
                    // if success login
                    // Auth::logout();
                    $id=Auth::user()->id;
                    Bitacora::create([
                        'descripcion'=>'Inicio de sesión',
                        'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
                        'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
                        'usuario_id'=>$id,
                    ]);
                    return redirect('start');

                    //return redirect()->intended('/details');
                }
           // }
            //return 'eres un tecnico';
      //  }
        // if failed login
        return redirect('/');
    }
}
