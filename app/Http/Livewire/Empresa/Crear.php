<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Bitacora;
use App\Models\Empresa;
use App\Models\EmpresaUsuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Crear extends Component
{
    use WithFileUploads;

    public $photo;
    public $photoTemp='https://customercare.igloosoftware.com/.api2/api/v1/communities/10068556/previews/thumbnails/4fc20722-5368-e911-80d5-b82a72db46f2?width=680&height=680&crop=False';
    public $nit;
    public $nombre;

    protected $listeners=[
      'registrar',
      'temp'
    ];

    public function render()
    {
        return view('livewire.empresa.crear');
    }

    public function registrar($imageURL)
    {
        $this->photo=$imageURL;
        $this->validate([
            'photo' => 'string|required',
            'nit' => 'integer|required',
            'nombre' => 'string|required',
        ]);
        //$path = $this->photo->store('img_empresas','public');

        $empresa = new Empresa();
        $empresa->nombre = $this->nombre;
        $empresa->nit = $this->nit;
        $empresa->image_url = $this->photo;
        $empresa->save();

        $empresa_usuario=new EmpresaUsuario();
        $empresa_usuario->usuario_id=Auth::user()->id;
        $empresa_usuario->empresa_id=$empresa->id;
        $empresa_usuario->save();

        $id=Auth::user()->id;
        Bitacora::create([
            'descripcion'=>'Registro una empresa',
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'hora'=>Carbon::now('America/La_Paz')->toTimeString(),
            'usuario_id'=>$id,
        ]);


        $this->redirect(route('start'));
    }
    public function temp($tempURL){
        $this->photoTemp=$tempURL;
    }
}
