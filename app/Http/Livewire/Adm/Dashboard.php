<?php

namespace App\Http\Livewire\Adm;

use App\Models\Factura;
use App\Models\Producto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{

    public $users;
    public $fechas;
    public $cantidad;
    public function render()
    {
       $this->users=DB::table('users')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as cantidad'))
            ->groupBy('date')
            ->get();
       $i=0;
       foreach ($this->users as $user){
           $this->fechas[$i]=$user->date;
           $this->cantidad[$i]=$user->cantidad;
           $i=$i+1;
       }


        return view('livewire.adm.dashboard')->layout('layouts.adm');
    }
}
