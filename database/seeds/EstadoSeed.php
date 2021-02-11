<?php

use App\Estado;
use Illuminate\Database\Seeder;

class EstadoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['id'=>1, 'codigo'=>'1', 'descripcion'=>'ACTIVO', 'class'=>'success']);
		Estado::create(['id'=>2, 'codigo'=>'0', 'descripcion'=>'INACTIVO', 'class'=>'danger']);
		Estado::create(['id'=>3, 'codigo'=>'3', 'descripcion'=>'ANULADO', 'class'=>'danger']);
		Estado::create(['id'=>4, 'codigo'=>'4', 'descripcion'=>'PENDIENTE', 'class'=>'success']);
		Estado::create(['id'=>5, 'codigo'=>'5', 'descripcion'=>'PARCIAL', 'class'=>'info']);
		Estado::create(['id'=>6, 'codigo'=>'6', 'descripcion'=>'TERMINADO', 'class'=>'success']);
    }
}
