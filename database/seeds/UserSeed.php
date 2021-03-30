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
    'nombre' => null,
	'email_verified_at'=>null,
	'password'=>'$2y$10$0MneaZPGeyafc/Q8JqGNsu1YXzklsWV0Mq3j7LEG/NbDJIQa9qWgy',
    'id_rol' => 1,
	'observacion'=>'Usuario Administrador creado por el sistema',
    'estado' => 1,
    'remember_token' => '',
    ]);

    }


	}
