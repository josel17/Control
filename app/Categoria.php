<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $guarded =[];
	protected $table = 'categoria';

    public function user()
    {
    	return $this->hasOne(User::class,'id','user_register_id');
    }
}
