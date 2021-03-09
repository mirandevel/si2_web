<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarjetaTipoPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta_tipo_pago', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tarjeta_id');
            $table->unsignedBigInteger('tipo_pagos_id');

            $table->foreign('tarjeta_id')
                ->references('id')
                ->on('tarjetas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('tipo_pagos_id')
                ->references('id')
                ->on('tipo_pagos')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarjeta_tipo_pago');
    }
}
