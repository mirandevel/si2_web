<?php

namespace Database\Seeders;

use App\Models\TipoPago;
use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPago::create([
            'tipo'=>'Tarjeta'
        ]);

        TipoPago::create([
            'tipo'=>'Paypal'
        ]);
    }
}
