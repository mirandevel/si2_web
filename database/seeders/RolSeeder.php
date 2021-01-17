<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'nombre' => 'Administrador',
            'descripcion' => 'Es el administrador del sitio web',
        ]);
        Rol::create([
            'nombre' => 'Miembro',
            'descripcion' => 'Es cualquier miembro que le pertenece a alguna empresa',
        ]);
        Rol::create([
            'nombre' => 'Cliente',
            'descripcion' => 'Es aquella persona capaz de realizar transacciones desde la app',
        ]);
    }
}
