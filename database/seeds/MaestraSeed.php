<?php

use App\Maestra;
use Illuminate\Database\Seeder;

class MaestraSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		Maestra::create(['id'=>1, 'codigo'=>'TD', 'descripcion'=> 'TIPO DOCUMENTO']);
		Maestra::create(['id'=>2, 'codigo'=>'G',  'descripcion'=> 'GENERO']);
		Maestra::create(['id'=>3, 'codigo'=>'PR', 'descripcion'=> 'PROFESION']);
		Maestra::create(['id'=>4, 'codigo'=>'UME', 'descripcion'=> 'UNIDAD DE MEDIDA']);
    }
}
