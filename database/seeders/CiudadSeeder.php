<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudad::create([
            'nombre' => 'Santa Cruz',
            'pais_id' => 1,
        ]);
        Ciudad::create([
            'nombre' => 'Beni',
            'pais_id' => 1,
        ]);
        Ciudad::create([
            'nombre' => 'La Paz',
            'pais_id' => 1,
        ]);

        Ciudad::create([
            'nombre' => 'Lima',
            'pais_id' => 2,
        ]);
        Ciudad::create([
            'nombre' => 'Cusco',
            'pais_id' => 2,
        ]);
    }
}
