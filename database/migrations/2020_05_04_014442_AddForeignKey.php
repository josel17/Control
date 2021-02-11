<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ADD FOREIGN KEY USERS
        Schema::table('users', function (Blueprint $table) {
             $table->foreign('id_persona')->references('id')->on('personas');
             $table->foreign('id_rol')->references('id')->on('roles');
        });

        //ADD FOREIGN KEY PERSONAS
        Schema::table('personas', function (Blueprint $table) {
            $table->foreign('id_tipodocumento')->references('id')->on('maestra_detalles');
            $table->foreign('id_genero')->references('id')->on('maestra_detalles');
            $table->foreign('id_ciudad')->references('id')->on('ciudades');
        });

        //ADD FOREIGN KEY maestra_detalles
         Schema::table('maestra_detalles', function (Blueprint $table) {
                $table->foreign('id_maestra')->references('id')->on('maestra');
                $table->foreign('id_estado')->references('id')->on('estado');
            });

         //add foreign key ciudades
         Schema::table('ciudades', function (Blueprint $table) {
                $table->foreign('id_departamento')->references('id')->on('departamentos');
            });
/*
         Schema::table('orden_compras',function(Blueprint $table){
            $table->foreign('id_detalle_orden')->references('id')->on('detalle_ocs');
         });*/

         //add foreign key
    }
    /**
    *||||||||||||||||||||||||||||||||||||||||||||||||||||||||||METODO DOWN ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remove foreign key users
        Schema::table('users', function (Blueprint $table) {
           // $table->dropForeign('id_persona');
        });

        // //remove foreign key personas
        //  Schema::table('personas', function (Blueprint $table) {
        //     $table->dropForeign('id_tipodocumento');
        //     $table->dropForeign('id_genero');
        //     $table->dropForeign('id_ciudad');
        // });

        //  //remove foreign key maestra_detalles
        // Schema::table('maestra_detalles', function (Blueprint $table) {
        //     $table->dropForeign('id_maestra');
        //     $table->dropForeign('id_estado');
        //     $table->dropForeign('id_maestra');
        // });

        // //remove foreign key ciudades
        //  Schema::table('ciudades', function (Blueprint $table) {
        //     $table->dropForeign('id_departamento');
        // });

    }
}
