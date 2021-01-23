<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->text('descripcion');
            $table->float('precio');
            $table->text('url_imagen');
            $table->text('url_3d');
            $table->unsignedTinyInteger('calificacion'); //cantidad de estrellas 0 a 5
            $table->unsignedSmallInteger('cantidad');

            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('garantia_id');
            $table->timestamps();

            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('marca_id')
                ->references('id')
                ->on('marcas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('garantia_id')
                ->references('id')
                ->on('garantias')
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
        Schema::dropIfExists('productos');
    }
}
