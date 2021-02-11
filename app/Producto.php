<?php

namespace App;

use App\Categoria;
use App\Laboratorio;
use App\MaestraDetalle;;
use App\Presentacion;
use App\Producto;
use App\Proveedor;
use App\ReglaImpuesto;
use App\Ume;
use App\MovimientosProducto;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $guarded = [];

    public function categoria()
    {
    	return $this->hasOne(Categoria::class,'id','id_categoria');
    }

    public function proveedor()
    {
    	return $this->hasOne(Proveedor::class, 'id','id_proveedor');
    }

    public function imagenes()
    {
        return $this->hasMany(Images::class);
    }

    public function ume()
    {
        return $this->hasOne(Ume::class,'id','id_ume');
    }

    public function presentacion()
    {
        return $this->hasOne(Presentacion::class,'id','id_presentacion');
    }

    public function estado()
    {
        return $this->hasOne(Estado::class, 'id', 'id_estado');
    }

    public function impuesto()
    {
        return $this->hasOne(ReglaImpuesto::class, 'id', 'id_regla_impuesto');
    }

    public function laboratorio()
    {
        return $this->hasOne(Laboratorio::class, 'id', 'id_laboratorio');
    }

    public function datos()
    {
        return $this->hasOne(Producto::class,'codigo','codigo_material');
    }

    public function movimientos()
    {
        return $this->hasMany(MovimientosProducto::class,'codigo_material','codigo');
    }

}
