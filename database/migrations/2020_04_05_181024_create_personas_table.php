<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('id_tipodocumento');
            $table->bigInteger('documento')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->unsignedInteger('id_genero');
            $table->string('email');
            $table->bigInteger('telefono');
            $table->string('direccion');
            $table->unsignedInteger('id_departamento')->nullable();
            $table->unsignedInteger('id_ciudad');
            $table->text('observacion')->nullable();
            $table->integer('tipo');
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
        Schema::dropIfExists('personas');
    }
}
