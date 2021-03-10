<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->char('estado');
            $table->float('total');
            $table->string('ubicacion');
            $table->date('fecha');
            $table->unsignedInteger('telefono');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('tipo_pago_id');

            $table->timestamps();

            $table->foreign('usuario_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('tipo_pago_id')
                ->references('id')
                ->on('tipo_pagos')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
