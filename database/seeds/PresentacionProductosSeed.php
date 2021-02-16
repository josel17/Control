<?php

use App\Presentacion;
use Illuminate\Database\Seeder;

class PresentacionProductosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentacion::create(['id'=>1, 'codigo'=>'BOL', 'descripcion'=>'Bolsa']);
		Presentacion::create(['id'=>2, 'codigo'=>'TAR', 'descripcion'=>'Tarro']);
		Presentacion::create(['id'=>3, 'codigo'=>'FRA', 'descripcion'=>'Frasco']);
		Presentacion::create(['id'=>4, 'codigo'=>'CAP', 'descripcion'=>'Capsula']);
		Presentacion::create(['id'=>5, 'codigo'=>'SCH', 'descripcion'=>'Sachet']);
    }
}
