<?php

namespace App\Http\Livewire\Adm;

use App\Models\Empresa;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{

    public $detalles;
    public $fechasC;
    public $cantidadC;
    public function mount()
    {
        session(['entrada_adm' => true]);
    }


    public $users;
    public $empresas;

    public function render()
    {
       $this->users=User::count();
       $this->empresas=Empresa::count();


        $this->detalles=DB::table('detalles')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(precio*cantidad) as precio'))
            ->whereMonth('created_at', '=', date('m'))
            ->groupBy('date')
            ->get();
        $i=0;
        foreach ($this->detalles as $detalle){
            $this->fechasC[$i]=$detalle->date;
            $this->cantidadC[$i]=$detalle->precio*0.05;
            $i=$i+1;
        }



        return view('livewire.adm.dashboard')->layout('layouts.adm');
    }
}
