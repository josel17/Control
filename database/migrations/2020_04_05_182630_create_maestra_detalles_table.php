<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestraDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestra_detalles', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('codigo');
            $table->string('detalle');
            $table->unsignedInteger('id_maestra');
            $table->unsignedInteger('id_estado');
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
        Schema::dropIfExists('maestra_detalle');
    }
}
