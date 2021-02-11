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
            $table->unsignedInteger('codigo')->unique();
            $table->string('nombre');
            $table->string('referencia');
            $table->unsignedInteger('id_categoria');
            $table->unsignedInteger('id_proveedor');
            $table->unsignedInteger('id_laboratorio');
            $table->string('reg_sanitario');
            $table->bigInteger('ean');
            $table->unsignedInteger('id_presentacion');
            $table->unsignedInteger('conte_primario');
            $table->integer('id_presentacion_venta');
            $table->unsignedInteger('medida_venta');
            $table->unsignedInteger('precio_compra');
            $table->unsignedInteger('precio_venta');
            $table->unsignedInteger('id_regla_impuesto');
            $table->unsignedInteger('id_estado');
            $table->text('descripcion');
            $table->timestamps();
            $table->foreign('id_categoria')->references('id')->on('categoria');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->foreign('id_presentacion')->references('id')->on('presentaciones');
            $table->foreign('id_estado')->references('id')->on('estado');
            $table->foreign('id_regla_impuesto')->references('id')->on('regla_impuestos');
            $table->foreign('id_laboratorio')->references('id')->on('laboratorios');

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
