<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_productos', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('producto_id');
            $table->timestamps();

            $table->primary(['producto_id', 'categoria_id']);

            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
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
        Schema::dropIfExists('categoria_productos');
    }
}
