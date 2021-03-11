<?php

namespace App\Http\Livewire;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Ciudad;
use App\Models\Pais;
use App\Models\RolUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;

class UserRegister extends Component
{
    use PasswordValidationRules;

    public $ciudades;
    public $paises;
    public $pais_id;

    public $nombre;
    public $email;
    public $password;
    public $ciudad_id;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'ciudad_id' => 'required',
        'password' => 'required',

    ];
    public function updated($propertyName)
    {
            $this->validateOnly($propertyName);
    }

    public function mount(){
        $this->pais_id=1;
        $this->paises=Pais::all();
        $this->ciudades=Ciudad::where('pais_id',$this->pais_id)->get();
        $this->ciudad_id=$this->ciudades->first()->id;
    }
    public function render()
    {
        $this->ciudades=Ciudad::where('pais_id',$this->pais_id)->get();
        return view('livewire.user-register')->layout('layouts.guest');
    }

    public function submit(){
        $validatedData = $this->validate();

        $user=User::create([
            'name'=>$this->nombre,
            'email'=>$this->email,
            'password'=> Hash::make($this->password),
            'activo'=>true,
            'ciudad_id'=>$this->ciudad_id,
        ]);
        RolUser::create([
            'rol_id' => 2,
            'user_id' => $user->id,
        ]);
        RolUser::create([
            'rol_id' => 3,
            'user_id' => $user->id,
        ]);
        $this->redirect('login');
    }
}
