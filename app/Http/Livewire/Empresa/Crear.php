<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Empresa;
use App\Models\EmpresaUsuario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Crear extends Component
{
    use WithFileUploads;

    public $photo;
    public $nit;
    public $nombre;

    public function render()
    {
        return view('livewire.empresa.crear');
    }

    public function save()
    {
        $this->validate([
            'photo' => 'image',
            'nit' => 'integer',
            'nombre' => 'string',
        ]);
        $path = $this->photo->store('img_empresas','public');

        $empresa = new Empresa();
        $empresa->nombre = $this->nombre;
        $empresa->nit = $this->nit;
        $empresa->image_url = $path;
        $empresa->save();

        $empresa_usuario=new EmpresaUsuario();
        $empresa_usuario->usuario_id=Auth::user()->id;
        $empresa_usuario->empresa_id=$empresa->id;
        $empresa_usuario->save();


        $this->redirect(route('start'));
    }
}
