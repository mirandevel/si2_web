<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use App\Models\EmpresaUsuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Start extends Component
{
    public $user;
    public $roles;
    public $empresas;
    public function mount(){
        $this->user=Auth::user();
        $this->empresas=Empresa::select('empresas.*')
            ->join('empresa_usuarios','empresa_id','empresas.id')
            ->where('usuario_id',$this->user->id)->get();

        $this->roles=Rol::select('roles.*')
            ->join('rol_users','id','rol_id')
            ->where('user_id',$this->user->id)->get();
        $this->roles=$this->roles->count();






    }
    public function render()
    {
        return view('livewire.start')->layout('layouts.guest');
    }
}
