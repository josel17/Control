<?php

namespace App;

use App\DetalleFactura;
use App\Persona;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
	protected $fillable= ['numero','cliente_documento','iva','subtotal','total'];


	public function detalle()
    {
    	return $this->hasMany(DetalleFactura::class,'factura_numero','numero');
    }

    public function cliente()
    {
    	return $this->hasMany(Persona::class,'documento','cliente_documento');
    }
}
