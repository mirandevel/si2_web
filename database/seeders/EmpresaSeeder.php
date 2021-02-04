<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'nombre' => 'Ikea',
            'nit' => '1234',
            'image_url' => '',
        ]);
        Empresa::create([
            'nombre' => 'Multicenter',
            'nit' => '4321',
            'image_url' => '',
        ]);
        Empresa::create([
            'nombre' => 'Hipermaxi',
            'nit' => '1243',
            'image_url' => '',
        ]);
        Empresa::create([
            'nombre' => 'Tienda Amiga',
            'nit' => '4312',
            'image_url' => '',
        ]);
    }
}
