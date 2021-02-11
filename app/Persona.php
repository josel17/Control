<?php

namespace App;


use App\Ciudad;
use App\Departamento;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $guarded = [];

    public function ciudad()
    {
    	return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }

    public function user()
    {
    	return $this->hasOne(User::class,'id_persona');
    }

    public function scopePersona($query)
    {
    	$query->whit(['user'])->where('tipo',1);
    }

    public function buscarcliente($doc)
    {
        $sql =  Persona::where('documento','like', '%'.$doc.'%')->get();
        return $sql;

    }
}
