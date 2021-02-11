<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->unsignedInteger('id_estado');
            $table->unsignedInteger('user_register_id');
            $table->timestamps();
            $table->foreign('user_register_id')->references('id')->on('users');
            $table->foreign('id_estado')->references('id')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');

          //remove foreign key detalle_orden
       /* Schema::table('categoria', function (Blueprint $table) {
            $table->dropForeign('user_register_id');
            $table->dropForeign('id_estado');
        });*/

    }
}
