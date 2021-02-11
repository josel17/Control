<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->BigInteger('nit');
            $table->string('nombre');
            $table->string('direccion');
            $table->BigInteger('telefono');
            $table->integer('tipo_proveedor');
            $table->timestamps();
           // $table->foreign('user_register_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
