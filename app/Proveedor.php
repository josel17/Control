<?php

namespace App;

use App\User;
use App\Proveedor;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
	protected $guarded =[];
	protected $table = 'proveedor';

	public function producto()
	{
		return $this->hasMany(Proveedor::class, 'id_proveedor');
	}

	public function user()
	{
		return $this->hasMany(User::class,'id');
	}
}
