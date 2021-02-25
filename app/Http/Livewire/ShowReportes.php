<?php

namespace App\Http\Livewire;

use App\Models\RolUser;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowReportes extends Component
{
    public $message = 'ini';

    public function descargarReporteDeVentas()
    {
        $pdf = app('dompdf.wrapper');
        $data = [0 => 4, 1 => 23];
        $pdf->loadView('prueba', compact($data));
        $pdf->save(storage_path('app/public/') . 'archivo.pdf');

        return response()->download(storage_path('app/public/') . 'archivo.pdf');
    }

    public function descargarReporteDeProductos()
    {

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
