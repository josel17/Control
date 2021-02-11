<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class DetalleFactura extends Model
{
	protected $fillable = ['factura_id','producto_codigo','cantidad','precio_unitario','iva','total'];
    protected $table = "detalle_facturas";
}
