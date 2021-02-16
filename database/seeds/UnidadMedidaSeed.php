<?php

use Illuminate\Database\Seeder;

class UnidadMedidaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
       public function run()
    {
        Ume::create(['id'=>1, 'nombre'=>'PZA']);
       	Ume::create(['id'=>2, 'nombre'=>'CAJ']);
       	Ume::create(['id'=>3, 'nombre'=>'UNI']);
    }
}
