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
        if (!$this->esAdministrador())
        {
            $pdf = app('dompdf.wrapper');

            //id de la empresa del usuaruo actual
            $idEmpresa = DB::table('empresa_usuarios')
                ->select('empresa_id')
                ->where('usuario_id', '=', Auth::user()->id)
                ->get()->pluck('empresa_id')->toArray();
            $idEmpresa = $idEmpresa[0];

            $productosVendidos = DB::table('productos')
                ->select('productos.id', 'productos.nombre', 'detalles.precio', 'detalles.cantidad', 'marcas.nombre as marca', 'detalles.created_at as fecha')
                ->where('productos.empresa_id', '=', $idEmpresa)
                ->join('detalles', 'productos.id', '=', 'detalles.producto_id')
                ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
                ->get();

            $pdf->loadView('reporte-ventas', ['productos' => $productosVendidos]);
            $pdf->save(storage_path('app/public/') . 'reporte-ventas.pdf');

            return response()->download(storage_path('app/public/') . 'reporte-ventas.pdf');
        } else {
            $this->dispatchBrowserEvent('respuesta', ['value' => 'solo los miembros de empresas pueden descargar reportes']);
        }
    }

    public function descargarReporteDeProductos()
    {
        if (!$this->esAdministrador())
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
        } else {
            $this->dispatchBrowserEvent('respuesta', ['value' => 'solo los miembros de empresas pueden descargar reportes']);
        }
    }

    public function esAdministrador()
    {
        return DB::table('rol_users')
                ->where('rol_id', '=', 1)
                ->where('user_id', '=', Auth::user()->id)
                ->count() == 1;
    }

    public function render()
    {
        return view('livewire.show-reportes');
    }
}
