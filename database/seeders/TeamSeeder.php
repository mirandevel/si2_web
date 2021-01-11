<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'cliente'
        ]);
        Team::create([
            'name' => 'administrador'
        ]);
        Team::create([
            'name' => 'miembro'
        ]);
    }
}
