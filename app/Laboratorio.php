<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $guarded = [];

    public function producto()
	{
		return $this->hasMany(Laboratorio::class, 'id_laboratorio');
	}
}
