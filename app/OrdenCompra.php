<?php

namespace App;

use App\DatosEmpresa;
use App\DetalleOc;
use App\Estado;
use App\OrdenCompra;
use App\Producto;
use App\Proveedor;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{

    protected $guarded = [];

    public function estado()
    {
    	return $this->hasOne(Estado::class,'id','id_estado');
    }

    public function cliente()
    {
    	return $this->hasONe(DatosEmpresa::class,'id','id_empresa');
    }

    public function proveedor()
    {
    	return $this->hasOne(Proveedor::class,'id','id_proveedor');
    }

    public function user()
    {
    	return $this->hasOne(User::class, 'id','id_user');
    }

    public function detalle()
    {
      return $this->hasMany(DetalleOc::class,'numero_orden','numero');
    }

    public function detalleoc()
    {
        return $this->hasManyThrough(Producto::class, DetalleOc::class,'numero_orden','codigo','numero','codigo_producto');
    }



}
