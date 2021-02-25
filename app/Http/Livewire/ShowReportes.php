<?php

namespace App\Http\Livewire;

use App\Models\RolUser;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowReportes extends Component
{
    public $message = 'ini';

    public function descargarReporteDeVentas()
    {

    }

    public function descargarReporteDeProductos()
    {
        $pdf = app('dompdf.wrapper');

        //id de la empresa del usuaruo actual
        $idEmpresa = DB::table('empresa_usuarios')
            ->select('empresa_id')
            ->where('usuario_id', '=', Auth::user()->id)
            ->get()->pluck('empresa_id')->toArray();
        $idEmpresa = $idEmpresa[0];

        $productosDeLaEmpresa = DB::table('productos')
            ->select('productos.id', 'productos.nombre', 'precio', 'calificacion', 'cantidad', 'marcas.nombre as marca', 'garantias.tiempo')
            ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
            ->join('garantias', 'productos.garantia_id', '=', 'garantias.id')
            ->where('empresa_id', '=', $idEmpresa)
            ->get();

        $pdf->loadView('reporte-productos', ['productos' => $productosDeLaEmpresa]);
        $pdf->save(storage_path('app/public/') . 'reporte-productos.pdf');

        return response()->download(storage_path('app/public/') . 'reporte-productos.pdf');
    }

    public function esAdministrador()
    {
        return RolUser::where('user_id', '=', Auth::user()->id)
            ->where('rol_id', '=', 1)
            ->count() == 1;
    }

    public function render()
    {
        return view('livewire.show-reportes');
    }
}
