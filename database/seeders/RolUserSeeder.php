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
        RolUser::create([
            'rol_id' => 1,
            'user_id' => 1,
        ]);
        RolUser::create([
            'rol_id' => 2,
            'user_id' => 1,
        ]);
        RolUser::create([
            'rol_id' => 3,
            'user_id' => 1,
        ]);

        RolUser::create([
            'rol_id' => 1,
            'user_id' => 2,
        ]);
        RolUser::create([
            'rol_id' => 2,
            'user_id' => 2,
        ]);
        RolUser::create([
            'rol_id' => 3,
            'user_id' => 2,
        ]);

        RolUser::create([
            'rol_id' => 1,
            'user_id' => 3,
        ]);
        RolUser::create([
            'rol_id' => 2,
            'user_id' => 3,
        ]);
        RolUser::create([
            'rol_id' => 3,
            'user_id' => 3,
        ]);
    }
}
