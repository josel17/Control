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
            $table->integerIncrements('id');
            $table->string('url_imagen');
            $table->string('nombre');
            $table->unsignedInteger('id_categoria');
            $table->unsignedInteger('id_proveedor');
            $table->unsignedInteger('id_ume');
            $table->ussignedInteger('id_estado');
            $table->timestamps();
            $table->foreign('categoria')->references('id')->on('categorias');
            $table->foreign('proveedor')->references('id')->on('provedores');
            $table->foreign('ume')->references('id')->on('ume');

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
