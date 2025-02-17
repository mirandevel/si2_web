<?php

namespace App\Http\Controllers\api;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\RolUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use PasswordValidationRules;

    public function register(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'ciudad_id' => 'exists:App\Models\Pais,id'
        ]);

        if($validator->fails()){
            return response()->json(['status_code'=>400,'message'=>$validator->errors()]);
        }
        //$result=$request->file('profile_photo_path')->store('profile');
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'activo' => true,
            'ciudad_id' => $request['ciudad_id']
        ]);

        RolUser::create([
            'rol_id' => 3,
            'user_id' => $user->id,
        ]);

        return $user;
    }

    public function login(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->first('email')]);
        }

        $credentials=request(['email','password']);

        if(!Auth::attempt($credentials)){
            return response()->json(['error'=>'datos invalidos']);
        }

        $user=User::where('email',$request->email)->first();
        $tokenResult=$user->createToken('authToken')->plainTextToken;
        return response()->json(['token'=>$tokenResult,
            'email'=>Auth::user()->email,
            'error'=>null,
            'id'=>$user->id,
            'verification'=>Auth::user()->email_verified_at]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status_code'=>200,'message'=>'token deleted']);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $value=$status === Password::RESET_LINK_SENT;
        return ['respuesta'=>__($status)];
    }

    public function sendEmail(Request $request)
    {
        $details = [
            'title' => 'Confirmar correo electrónico',
            'body' => 'This is for testing email using smtp'
        ];
        \Illuminate\Support\Facades\Mail::to($request['email'])->send(new \App\Mail\MyTestMail($details,$request['id']));
        return response()->json(['email'=>'ok']);
    }

    public function actualizarPerfil(Request $request)
    {

     //   $user = User::findOrFail($request->user()->id);
        //ddsf
       // $user->email = $request["correo"];
       // $user->name = $request["nombre"];
        DB::table('users')
            ->where('id',$request->user()->id)
            ->update(['email_verified_at'=> new Carbon(null),'email'=> $request["correo"]
            ,'name'=>$request["nombre"]]);
      //  $user->save();
       // $user->email = $request->input('correo');
    //    $user->name = $request->input('nombre');
        return ['bandera'=>true];
    }

    public function actualizarContraseña(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        if(Hash::check($request["contraseñav"],$user->password))
        {
            $user->password = Hash::make($request["contraseña"]);
            $user->save();
            return ['bandera'=>true];
        }else{
            return ['bandera'=>false];
        }

    }
}
