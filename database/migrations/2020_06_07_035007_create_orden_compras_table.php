<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_compras', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique();
            $table->unsignedInteger('numero')->primary();
            $table->unsignedInteger('id_empresa');
            $table->unsignedInteger('id_proveedor');
            $table->unsignedInteger('valor_compra');
            $table->unsignedInteger('cant_total');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_estado');
            $table->text('observaciones');
            $table->timestamps();
            $table->foreign('id_empresa')->references('id')->on('datos_empresas');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('orden_compras');

         //remove foreign key orden_compras
       /* Schema::table('orden_compras', function (Blueprint $table) {
            $table->dropForeign('id_empresa');
            $table->dropForeign('id_proveedor');
            $table->dropForeign('id_user');
            $table->dropForeign('id_estado');
        });*/


    }

    }
