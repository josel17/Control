<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedInteger('numero')->unique();
            $table->BigInteger('cliente_documento');
            $table->decimal('iva',10,2);
            $table->decimal('subtotal',10,2);
            $table->decimal('total',10,2);
            $table->timestamps();
            $table->foreign('cliente_documento')->references('documento')->on('personas');
        });

        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->unsignedInteger('factura_numero')->nullable();
            $table->unsignedInteger('producto_codigo');
            $table->unsignedInteger('cantidad');
            $table->decimal('precio_unitario',10,2);
            $table->decimal('iva',10,2);
            $table->decimal('total',10,2);
            $table->timestamps();
            $table->foreign('factura_numero')->references('numero')->on('facturas');
            $table->foreign('producto_codigo')->references('codigo')->on('productos');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
        Schema::dropIfExists('detalle_facturas');

    }
}
