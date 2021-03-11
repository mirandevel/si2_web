<?php

namespace App\Http\Livewire\Adm;

use App\Models\Factura;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Estadisticas extends Component
{


    public $users;
    public $empresas;
    public $detalles;

    public $fechasU;
    public $cantidadU;
   // public $rangoU=1;

    public $fechasE;
    public $cantidadE;
   // public $rangoE;

    public $fechasC;
    public $cantidadC;
    //public $rangoC;


    public function mount()
    {
        session(['entrada_adm' => true]);
    }

    public function render()
    {
        $this->users = DB::table('users')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as cantidad'));
       /* if ($this->rangoU == 1) {
            $this->users = $this->users->whereDay('created_at',  date('d'));
        }
        if ($this->rangoU == 3) {
            $this->users = $this->users->whereMonth('created_at', date('m'));


        }
        if ($this->rangoU == 4) {
            $this->users = $this->users->whereYear('created_at', date('Y'));
        }*/

        $this->users = $this->users
            ->groupBy('date')
            ->get();
        $i = 0;
        foreach ($this->users as $user) {
            $this->fechasU[$i] = $user->date;
            $this->cantidadU[$i] = $user->cantidad;
            $i = $i + 1;
        }

        $this->empresas = DB::table('empresas')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as cantidad'));
      /*  if ($this->rangoE == 1) $this->empresas = $this->empresas->whereDay('created_at',  date('d'));
        if ($this->rangoE == 3)
            $this->empresas = $this->empresas->whereMonth('created_at',  date('m'));
        if ($this->rangoE == 4)
            $this->empresas = $this->empresas->whereYear('created_at',  date('Y'));
*/
        $this->empresas = $this->empresas
            ->groupBy('date')
            ->get();
        $i = 0;

        foreach ($this->empresas as $empresa) {
            $this->fechasE[$i] = $empresa->date;
            $this->cantidadE[$i] = $empresa->cantidad;
            $i = $i + 1;
        }


        $this->detalles = DB::table('detalles')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(precio*cantidad) as precio'))
             ->groupBy('date')
            ->get();
        $i = 0;
        foreach ($this->detalles as $detalle) {
            $this->fechasC[$i] = $detalle->date;
            $this->cantidadC[$i] = $detalle->precio * 0.05;
            $i = $i + 1;
        }


        return view('livewire.adm.estadisticas')->layout('layouts.adm');
    }
}
