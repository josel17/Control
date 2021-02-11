<?php

namespace App;

use App\MovimientosProducto;
use App\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Diferencia extends Model
{
    public function producto()
    {
    	return $this->hasOne(Producto::class,'codigo','codigo_material');
    }

    public function movimientos()
    {
    	return $this->hasMany(MovimientosProducto::class,'codigo_material','codigo_material')->sum('cantidad');

    }


}
