<?php

use App\TipoMovimientos;
use Illuminate\Database\Seeder;

class MovimientosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoMovimientos::create(['tipo_movimiento'=>'101','movimiento'=>'Ingreso inventario','direccion_mov' => 'Entrada']);
    }
}
