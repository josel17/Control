<?php

use App\Departamento;
use Illuminate\Database\Seeder;

class DepartamentosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


		Departamento::create(['id'=>5,  'nombre'=>'ANTIOQUIA']);
		Departamento::create(['id'=>8,  'nombre'=>'ATLANTICO']);
		Departamento::create(['id'=>11, 'nombre'=>'BOGOTA']);
		Departamento::create(['id'=>13, 'nombre'=>'BOLIVAR']);
		Departamento::create(['id'=>15, 'nombre'=>'BOYACA']);
		Departamento::create(['id'=>17, 'nombre'=>'CALDAS']);
		Departamento::create(['id'=>18, 'nombre'=>'CAQUETA']);
		Departamento::create(['id'=>19, 'nombre'=>'CAUCA']);
		Departamento::create(['id'=>20, 'nombre'=>'CESAR']);
		Departamento::create(['id'=>23, 'nombre'=>'CORDOBA']);
		Departamento::create(['id'=>25, 'nombre'=>'CUNDINAMARCA']);
		Departamento::create(['id'=>27, 'nombre'=>'CHOCO']);
		Departamento::create(['id'=>41, 'nombre'=>'HUILA']);
		Departamento::create(['id'=>44, 'nombre'=>'LA GUAJIRA']);
		Departamento::create(['id'=>47, 'nombre'=>'MAGDALENA']);
		Departamento::create(['id'=>50, 'nombre'=>'META']);
		Departamento::create(['id'=>52, 'nombre'=>'NARI?O']);
		Departamento::create(['id'=>54, 'nombre'=>'N. DE SANTANDER']);
		Departamento::create(['id'=>63, 'nombre'=>'QUINDIO']);
		Departamento::create(['id'=>66, 'nombre'=>'RISARALDA']);
		Departamento::create(['id'=>68, 'nombre'=>'SANTANDER']);
		Departamento::create(['id'=>70, 'nombre'=>'SUCRE']);
		Departamento::create(['id'=>73, 'nombre'=>'TOLIMA']);
		Departamento::create(['id'=>76, 'nombre'=>'VALLE DEL CAUCA']);
		Departamento::create(['id'=>81, 'nombre'=>'ARAUCA']);
		Departamento::create(['id'=>85, 'nombre'=>'CASANARE']);
		Departamento::create(['id'=>86, 'nombre'=>'PUTUMAYO']);
		Departamento::create(['id'=>88, 'nombre'=>'SAN ANDRES']);
		Departamento::create(['id'=>91, 'nombre'=>'AMAZONAS']);
		Departamento::create(['id'=>94, 'nombre'=>'GUAINIA']);
		Departamento::create(['id'=>95, 'nombre'=>'GUAVIARE']);
		Departamento::create(['id'=>97, 'nombre'=>'VAUPES']);
		Departamento::create(['id'=>99, 'nombre'=>'VICHADA']);
    }
}

