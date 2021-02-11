<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //

    protected $guarded = [];

    public function estado()
    {
    	return $this->hasOne(Estado::class,'id','id_estado');
    }
}


