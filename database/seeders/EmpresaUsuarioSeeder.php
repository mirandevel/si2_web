<?php

namespace Database\Seeders;

use App\Models\EmpresaUsuario;
use Illuminate\Database\Seeder;

class EmpresaUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmpresaUsuario::create([
            'estado' => true,
            'usuario_id' => 4,
            'empresa_id' => 1,
        ]);
        EmpresaUsuario::create([
            'estado' => true,
            'usuario_id' => 5,
            'empresa_id' => 1,
        ]);
        EmpresaUsuario::create([
            'estado' => true,
            'usuario_id' => 6,
            'empresa_id' => 2,
        ]);
        EmpresaUsuario::create([
            'estado' => true,
            'usuario_id' => 7,
            'empresa_id' => 2,
        ]);
        EmpresaUsuario::create([
            'estado' => true,
            'usuario_id' => 8,
            'empresa_id' => 3,
        ]);
        EmpresaUsuario::create([
            'estado' => true,
            'usuario_id' => 9,
            'empresa_id' => 3,
        ]);
        EmpresaUsuario::create([
            'estado' => true,
            'usuario_id' => 10,
            'empresa_id' => 4,
        ]);
        EmpresaUsuario::create([
            'estado' => true,
            'usuario_id' => 11,
            'empresa_id' => 4,
        ]);
    }
}
