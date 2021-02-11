<?php

use App\MaestraDetalle;
use Illuminate\Database\Seeder;

class MaestraDetalleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		MaestraDetalle::Create(['id'=>4, 'codigo'=>'CC','detalle'=> 'CEDULA', 'id_maestra'=>1,'id_estado'=> 1]);
		MaestraDetalle::Create(['id'=>5, 'codigo'=>'TI','detalle'=> 'TARJETA DE IDENTIDAD', 'id_maestra'=>1,'id_estado'=> 1]);
		MaestraDetalle::Create(['id'=>6, 'codigo'=>'M', 'detalle'=>'MASCULINO', 'id_maestra'=>2,'id_estado'=> 1]);
		MaestraDetalle::Create(['id'=>7, 'codigo'=>'F','detalle'=> 'FEMENINO', 'id_maestra'=>2,'id_estado'=> 1]);
		MaestraDetalle::Create(['id'=>8, 'codigo'=>'P', 'detalle'=>'INGENIERO DE SISTEMAS', 'id_maestra'=>3,'id_estado'=> 1]);
		MaestraDetalle::Create(['id'=>9, 'codigo'=>'M', 'detalle'=>'MEDICO VETERINARIO', 'id_maestra'=>3,'id_estado'=> 1]);
		MaestraDetalle::Create(['id'=>10,'codigo'=>'CE','detalle'=> 'CEDULA EXTRANGERA', 'id_maestra'=>1,'id_estado'=> 1]);
		MaestraDetalle::Create(['id'=>11,'codigo'=>'PA','detalle'=> 'PASAPORTE', 'id_maestra'=>1,'id_estado'=> 1]);
		MaestraDetalle::Create(['id'=>12,'codigo'=>'PZA','detalle'=> 'Pieza', 'id_maestra'=>4,'id_estado'=> 1]);
		MaestraDetalle::Create(['id'=>13,'codigo'=>'CAJ','detalle'=> 'CAJA', 'id_maestra'=>4,'id_estado'=> 1]);

    }
}


