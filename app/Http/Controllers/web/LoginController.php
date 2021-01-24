<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
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
