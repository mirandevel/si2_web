<?php

namespace Database\Seeders;

use App\Models\RolUser;
use Illuminate\Database\Seeder;

class RolUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //administradores
        for ($i = 1; $i <= 3; $i++)
        {
            for ($j = 1; $j <= 3; $j++)
            {
                RolUser::create([
                    'rol_id' => $j,
                    'user_id' => $i,
                ]);
            }
        }
        //miembros
        for ($i = 4; $i <= 11; $i++)
        {
            for ($j = 2; $j <= 3; $j++)
            {
                RolUser::create([
                    'rol_id' => $j,
                    'user_id' => $i,
                ]);
            }
        }
        //clientes
        for ($i = 12; $i <= 21; $i++)
        {
            RolUser::create([
                'rol_id' => 3,
                'user_id' => $i,
            ]);
        }

    }
}
