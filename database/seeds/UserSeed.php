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
	'password'=>'$2y$10$BYLqb6RlCURS9bg6fJ2z.O3uaOUJXdJcwvHm08Ld4B4ow0k7..ZLu',
	'descripcion'=>'Usuario Administrador creado por el sistema',]);
    }


	}
