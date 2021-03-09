<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->char('estado', 1);
            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedSmallInteger('cantidad');
            $table->float('precio');
            $table->char('estado');

            $table->unsignedBigInteger('promocion_id');
            $table->unsignedBigInteger('comision_id');
            $table->timestamps();

            $table->primary(['factura_id', 'producto_id']);

            $table->foreign('factura_id')
                ->references('id')
                ->on('facturas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('promocion_id')
                ->references('id')
                ->on('promociones')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('comision_id')
                ->references('id')
                ->on('comisiones')
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
        Schema::dropIfExists('detalles');
    }
}
