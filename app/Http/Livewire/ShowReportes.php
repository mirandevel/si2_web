<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowReportes extends Component
{
    public $fechaInicio;
    public $fechaFin;
    public $adm;  //todo *
    public $empresaid; //todo *

    public function mount()
    {
        $this->fechaInicio = '2021-01-25';
        $this->fechaFin = '2021-02-28';
        $this->adm = Auth::user()->es_administrador;
        $this->empresaid = session('empresa_id');
    }

    public function descargarReporteDeVentas()
    {
        $pdf = app('dompdf.wrapper');

        if (session('entrada_adm'))
        {
            $productosVendidos = DB::table('productos')
                ->select('productos.id', 'productos.nombre', 'detalles.precio', 'detalles.cantidad', 'marcas.nombre as marca', 'detalles.created_at as fecha')
                ->whereBetween('detalles.created_at', [$this->fechaInicio, $this->fechaFin])
                ->join('detalles', 'productos.id', '=', 'detalles.producto_id')
                ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
                ->get();
        } else {
            $productosVendidos = DB::table('productos')
                ->select('productos.id', 'productos.nombre', 'detalles.precio', 'detalles.cantidad', 'marcas.nombre as marca', 'detalles.created_at as fecha')
                ->where('productos.empresa_id', '=', session('empresa_id'))
                ->whereBetween('detalles.created_at', [$this->fechaInicio, $this->fechaFin])
                ->join('detalles', 'productos.id', '=', 'detalles.producto_id')
                ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
                ->get();
        }

        $pdf->loadView('reporte-ventas', [
            'productos' => $productosVendidos,
            'fecha_inicio' => $this->fechaInicio,
            'fecha_fin' => $this->fechaFin
        ]);
        $pdf->save(storage_path('app/public/') . 'reporte-ventas.pdf');

        return response()->download(storage_path('app/public/') . 'reporte-ventas.pdf');
    }

    public function descargarReporteDeProductos()
    {
        $pdf = app('dompdf.wrapper');

        if (session('entrada_adm'))
        {
            $productosDeLaEmpresa = DB::table('productos')
                ->select('productos.id', 'productos.nombre', 'precio', 'calificacion', 'cantidad', 'marcas.nombre as marca', 'garantias.tiempo')
                ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
                ->join('garantias', 'productos.garantia_id', '=', 'garantias.id')
                ->get();
        } else {
            $productosDeLaEmpresa = DB::table('productos')
                ->select('productos.id', 'productos.nombre', 'precio', 'calificacion', 'cantidad', 'marcas.nombre as marca', 'garantias.tiempo')
                ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
                ->join('garantias', 'productos.garantia_id', '=', 'garantias.id')
                ->where('empresa_id', '=', session('empresa_id'))
                ->get();
        }

        $pdf->loadView('reporte-productos', [
            'productos' => $productosDeLaEmpresa,
            'fecha_inicio' => $this->fechaInicio,
            'fecha_fin' => $this->fechaFin
        ]);
        $pdf->save(storage_path('app/public/') . 'reporte-productos.pdf');

        return response()->download(storage_path('app/public/') . 'reporte-productos.pdf');

    }

    public function render()
    {
        return view('livewire.show-reportes');
    }
}
