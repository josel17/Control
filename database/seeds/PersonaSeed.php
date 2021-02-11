<?php

use App\Persona;
use Illuminate\Database\Seeder;

class PersonaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
		'id'=> 1,
		'id_tipodocumento'=> 4,
		'documento'=> 1,
		'nombre'=> 'Usuario',
		'apellidos'=> 'Administrador',
		'id_genero'=> 6,
		'email'=> 'admin@control.com',
		'telefono'=> 1,
		'direccion'=> '',
		'id_departamento'=> 1,
		'id_ciudad'=> 1,
		'observacion'=> 'Usuario Creado automaticamente por el sistema',
		'tipo'=> 1,
		]);
    }


}