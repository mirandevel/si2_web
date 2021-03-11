<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Factura;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{

    public $productos;
    public $empresas;
    public $cantidad;
    public $fechas;

    public function mount($empresa)
    {
        $idEmpresa = DB::table('empresas')
            ->where('nombre', '=', $empresa)
            ->value('id');
        $nameEmpresa = DB::table('empresas')
            ->where('nombre', '=', $empresa)
            ->value('nombre');
        //aumento el id de la empresa a la session y que no esta entrando como administrador
        session([
            'empresa_id' => $idEmpresa,
            'empresa_name' => $nameEmpresa,
            'entrada_adm' => false
            ]);
    }

    public function render()
    {
        $this->empresas=DB::table('empresas')
            ->select(DB::raw('DATE(detalles.created_at) as date'), DB::raw('sum(detalles.precio*detalles.cantidad) as prec'))
            ->join('productos','productos.empresa_id','=','empresas.id')
            ->join('detalles','productos.id','=','detalles.producto_id')
            ->where('empresas.id',session('empresa_id'))
            ->whereMonth('detalles.created_at', '=', date('m'))
            ->orderBy('date','asc')

            ->groupBy('date')
            ->get();
        $i=0;
        foreach ($this->empresas as $detalle){
            $this->fechas[$i]=$detalle->date;
            $this->cantidad[$i]=$detalle->prec;
            $i=$i+1;
        }

        $this->productos=DB::table('productos')
            ->select(DB::raw('count(*) as ventas'),'productos.*')
            ->join('empresas','empresas.id','=','productos.empresa_id')
            ->join('detalles','detalles.producto_id','=','productos.id')
            ->whereMonth('detalles.created_at', '=', date('m'))
            ->where('empresas.id',session('empresa_id'))
            ->groupBy('productos.id')
            ->orderBy('ventas','desc')
            ->take(5)
            ->get();


        return view('livewire.empresa.dashboard');
    }
}
