<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	User::create(['id'=>'1',
	'username'=>'admin',
	'id_persona'=>'1',
	//'email_verified_at'=>'',
	'password'=>'$2y$10$nHuvePMWPrKVX1IkEHr//.vcV9te/1Rur3UAcl.RmtRISumh8NGEi',
	'descripcion'=>'Usuario Administrador creado por el sistema',]);
    }


	}
