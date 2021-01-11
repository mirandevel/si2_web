<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use PasswordValidationRules;
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        if($validator->fails()){
            return response()->json(['status_code'=>400,'message'=>$validator->errors()]);
        }
        //$result=$request->file('profile_photo_path')->store('profile');
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'activo' => true,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status_code'=>200,'message'=>'token deleted']);
    }

    public function login(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json(['status_code'=>400,'message'=>'bad request']);
        }

        $credentials=request(['email','password']);
        if(!Auth::attempt($credentials)){
            return response()->json(['status_code'=>500,'message'=>'Unauthorized']);
        }
        $user=User::where('email',$request->email)->first();
        $tokenResult=$user->createToken('authToken')->plainTextToken;
        return response()->json(['status_code'=>200,'token'=>$tokenResult]);
    }
}
