<?php

namespace App\Http\Livewire\Empresa;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Estadisticas extends Component
{
    public $empresas;
    public $cantidad;
    public $fechas;

    public $productos;
    public $cantidadP;
    public $fechasP;
    public function render()
    {
        $this->empresas=DB::table('empresas')
            ->select(DB::raw('DATE(detalles.created_at) as date'), DB::raw('sum(detalles.precio*detalles.cantidad) as prec'))
            ->join('productos','productos.empresa_id','=','empresas.id')
            ->join('detalles','productos.id','=','detalles.producto_id')
            ->where('empresas.id',session('empresa_id'))
            ->orderBy('date','asc')

            ->groupBy('date')
            ->get();
        $i=0;
        foreach ($this->empresas as $detalle){
            $this->fechas[$i]=$detalle->date;
            $this->cantidad[$i]=$detalle->prec;
            $i=$i+1;
        }

        $this->productos=DB::table('empresas')
            ->select(DB::raw('DATE(detalles.created_at) as date'), DB::raw('sum(detalles.cantidad) as cant'))
            ->join('productos','productos.empresa_id','=','empresas.id')
            ->join('detalles','productos.id','=','detalles.producto_id')
            ->where('empresas.id',session('empresa_id'))
            ->orderBy('date','asc')

            ->groupBy('date')
            ->get();
        $i=0;
        foreach ($this->productos as $producto){
            $this->fechasP[$i]=$producto->date;
            $this->cantidadP[$i]=$producto->cant;
            $i=$i+1;
        }
        return view('livewire.empresa.estadisticas');
    }
}
