<?php

namespace Database\Seeders;

use App\Models\Garantia;
use Illuminate\Database\Seeder;

class GarantiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Garantia::create([
            'tiempo' => 3,//meses
        ]);
        Garantia::create([
            'tiempo' => 6,//meses
        ]);
        Garantia::create([
            'tiempo' => 12,//meses
        ]);
        Garantia::create([
            'tiempo' => 18,//meses
        ]);
        Garantia::create([
            'tiempo' => 24,//meses
        ]);
    }
}
