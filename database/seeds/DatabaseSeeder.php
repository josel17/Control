<?php

use App\Presentacion;
use App\Departamento;
use App\Estado;
use App\Persona;
use App\MaestraDetalle;
use App\Maestra;
use App\User;
use Database\Seeders;
use App\Ume;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            //EstadoSeed::class,
            //MaestraSeed::class,
            //MaestraDetalleSeed::class,
            //DepartamentosSeed::class,
            //CiudadesSeed::class,
            //PersonaSeed::class,
            //UserSeed::class,
            //RolesSeed::class,
            //PermisosSeed::class,
            //AssignRolesSeed::class,
            //UnidadMedidaSeed::class,
            //PresentacionProductosSeed::class,
            ImpuestosSeed::class
        );

    }
}
