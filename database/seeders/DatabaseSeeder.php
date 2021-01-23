<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaisSeeder::class,
            CiudadSeeder::class,
            UserSeeder::class,
            RolSeeder::class,
            RolUserSeeder::class,
            EmpresaSeeder::class,
            EmpresaUsuarioSeeder::class,
            CategoriaSeeder::class,
            GarantiaSeeder::class,
            MarcaSeeder::class,
            CategoriaUsuarioSeeder::class,
            ProductoSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
