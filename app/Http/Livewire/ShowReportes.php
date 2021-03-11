<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowReportes extends Component
{
    public $fechaInicio; //reporte ventas
    public $fechaFin; //reporte ventas

    public $fechaInicioUsuario; //reporte users
    public $fechaFinUsuario; //reporte users

    public $fechaInicioEmpresa; //reporte empresas
    public $fechaFinEmpresa; //reporte empresas

    public $fechaInicioProducto; //reporte productos
    public $fechaFinProducto; //reporte productos

    public $fechaInicioBitacoras;
    public $fechaFinBitacoras;

    public $adm;  //todo *
    public $empresaid; //todo *

    public function mount()
    {
        //repote ventas
        $this->fechaInicio = '2021-01-25';
        $this->fechaFin = '2021-02-28';

        //reporte users
        $this->fechaInicioUsuario = '2021-01-25';
        $this->fechaFinUsuario = '2021-02-28';

        //reporte empresas
        $this->fechaInicioEmpresa = '2021-01-25';
        $this->fechaFinEmpresa = '2021-02-28';

        //reportes productos
        $this->fechaInicioProducto = '2021-01-25';
        $this->fechaFinProducto = '2021-02-28';

        //reporte bitacoras
        $this->fechaInicioBitacoras = '2021-01-25';
        $this->fechaFinBitacoras = '2021-02-28';

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
                ->whereBetween('productos.created_at', [$this->fechaInicioProducto, $this->fechaFinProducto])
                ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
                ->join('garantias', 'productos.garantia_id', '=', 'garantias.id')
                ->get();
        } else {
            $productosDeLaEmpresa = DB::table('productos')
                ->select('productos.id', 'productos.nombre', 'precio', 'calificacion', 'cantidad', 'marcas.nombre as marca', 'garantias.tiempo')
                ->whereBetween('productos.created_at', [$this->fechaInicioProducto, $this->fechaFinProducto])
                ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
                ->join('garantias', 'productos.garantia_id', '=', 'garantias.id')
                ->where('empresa_id', '=', session('empresa_id'))
                ->get();
        }

        $pdf->loadView('reporte-productos', [
            'productos' => $productosDeLaEmpresa,
            'fecha_inicio' => $this->fechaInicioProducto,
            'fecha_fin' => $this->fechaFinProducto
        ]);
        $pdf->save(storage_path('app/public/') . 'reporte-productos.pdf');

        return response()->download(storage_path('app/public/') . 'reporte-productos.pdf');
    }

    public function descargarReporteDeUsuarios()
    {
        $pdf = app('dompdf.wrapper');
        $clientes = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'users.email_verified_at', 'users.activo', 'users.created_at')
            ->whereBetween('users.created_at', [$this->fechaInicioUsuario, $this->fechaFinUsuario])
            ->join('rol_users', 'users.id', '=', 'rol_users.user_id')
            ->where('rol_users.rol_id', '=', 3)
            ->get();

        $pdf->loadView('reporte-usuarios', [
            'usuarios' => $clientes,
            'fecha_inicio' => $this->fechaInicioUsuario,
            'fecha_fin' => $this->fechaFinUsuario,
        ]);

        $pdf->save(storage_path('app/public/') . 'reporte-usuarios.pdf');

        return response()->download(storage_path('app/public/') . 'reporte-usuarios.pdf');
    }

    public function descargarReporteDeEmpresas()
    {
        $pdf = app('dompdf.wrapper');
        $empresas = DB::table('empresas')
            ->select('id', 'nombre', 'nit', 'created_at')
            ->whereBetween('empresas.created_at', [$this->fechaInicioEmpresa, $this->fechaFinEmpresa])
            ->get();

        $pdf->loadView('reporte-empresas', [
            'empresas' => $empresas,
            'fecha_inicio' => $this->fechaInicioEmpresa,
            'fecha_fin' => $this->fechaFinEmpresa,
        ]);

        $pdf->save(storage_path('app/public/') . 'reporte-empresas.pdf');

        return response()->download(storage_path('app/public/') . 'reporte-empresas.pdf');
    }

    public function descargarReporteDeBitacoras()
    {
        $pdf = app('dompdf.wrapper');
        $bitacoras = DB::table('bitacoras')
            ->select('users.name', 'bitacoras.descripcion', 'bitacoras.fecha', 'bitacoras.hora')
            ->whereBetween('bitacoras.fecha', [$this->fechaInicioBitacoras, $this->fechaFinBitacoras])
            ->join('users', 'bitacoras.usuario_id', '=', 'users.id')
            ->orderBy('bitacoras.id', 'asc')
            ->get();

        $pdf->loadView('reporte-bitacoras', [
            'bitacoras' => $bitacoras,
            'fecha_inicio' => $this->fechaInicioBitacoras,
            'fecha_fin' => $this->fechaFinBitacoras,
        ]);

        $pdf->save(storage_path('app/public/') . 'reporte-bitacoras.pdf');

        return response()->download(storage_path('app/public/') . 'reporte-bitacoras.pdf');
    }

    public function render()
    {
        return view('livewire.show-reportes');
    }
}
