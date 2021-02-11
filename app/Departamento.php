<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
	public function deptos()
	{
		return $this->get();
	}
}
