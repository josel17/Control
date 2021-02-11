<?php

namespace App;

use App\Ciudad;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
	protected $table ="ciudades";

	public static function lciudad($id)
	{
		return Ciudad::where('id_departamento',"=",$id)->get();

	}
}
