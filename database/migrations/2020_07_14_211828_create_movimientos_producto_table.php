<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_producto', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('codigo_material')->nullable();
            $table->unsignedInteger('cantidad')->nullable();
            $table->unsignedInteger('movimiento');
            $table->date('fecha_movimiento')->nullable();
            $table->unsignedInteger('id_periodo')->nullable();
            $table->date('fecha_vto');
            $table->string('presentacion')->nullable();
            $table->string('proveedor')->nullable();
            $table->unsignedInteger('orden')->nullable();
            $table->string('user')->nullable();
            $table->timestamps();
            $table->foreign('id_periodo')->references('id')->on('periodos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}
