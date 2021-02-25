<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Factura;
use App\Models\Producto;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{

    public $productos;
    public $datos;
    public $fecha;
    public $monto;
    public $mes;
    public $fechaActual;
    public function render()
    {
        $this->fecha=[
            '05-02-2021',
            '05-02-2021',
            '08-02-2021',
            '015-02-2021',
            '015-02-2021',
            '016-02-2021',
            '20-02-2021',
            '20-02-2021',
            '22-02-2021',
            '23-02-2021',
            '24-02-2021',
        ];

        $this->monto=[
            150,
            25,
            120,
           50,
            42,
            463,
            102.3,
            15.5,
            563,
            56,
            356,
        ];
        $fechaActual=Carbon::now('America/La_Paz');
        $this->fechaActual=Carbon::now('America/La_Paz');
        $mes=$fechaActual->subMonth()->format('F');;
        $inicio=date($fechaActual->year.'-'.$fechaActual->month.'-01');
        $this->datos=Factura::whereBetween('fecha', [$inicio, $fechaActual->toDateString()])->get();
        $this->productos=Producto::take(5)->get();
        return view('livewire.empresa.dashboard');
    }
}
