<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOc extends Model
{
    protected $guarded = [];

    public function producto()
    {
    	return $this->belongsTo(DetalleOc::class,'asd','codigo_producto','codigo_producto');
    }
}
