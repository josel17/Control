<?php

use App\ReglaImpuesto;
use Illuminate\Database\Seeder;

class ImpuestosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReglaImpuesto::create(['id'=>1, 'nombre'=>'Sin Impuesto', 'tasa'=>'0']);
        ReglaImpuesto::create(['id'=>2, 'nombre'=>'IVA', 'tasa'=>'19']);
    }
}
