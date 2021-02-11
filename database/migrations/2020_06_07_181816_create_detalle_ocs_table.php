<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleOcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ocs', function (Blueprint $table) {
            $table->unsignedInteger('numero_orden');
            $table->unsignedInteger('codigo_producto');
            $table->unsignedInteger('cantidad');
            $table->unsignedInteger('cant_recibida');
            $table->unsignedInteger('valor_unitario');
            $table->unsignedInteger('valor_impuesto');
            $table->unsignedInteger('valor_total');
            $table->timestamps();
            $table->foreign('numero_orden')->references('numero')->on('orden_compras') ->onDelete('cascade');
            $table->foreign('codigo_producto')->references('codigo')->on('productos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ocs');

       /* Schema::table('orden_compras', function (Blueprint $table) {
            $table->dropForeign('id_orden');
            $table->dropForeign('id_codigo_producto');
        });*/
    }
}
