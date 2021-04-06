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
        $this->call(EstadoSeed::class);
        $this->call(MaestraSeed::class);
        $this->call(MaestraDetalleSeed::class);
        $this->call(DepartamentosSeed::class);
        $this->call(CiudadesSeed::class);
        $this->call(PersonaSeed::class);
        $this->call(RolesSeed::class);
        $this->call(UserSeed::class);
        $this->call(PermisosSeed::class);
        $this->call(AssignRolesSeed::class);
        $this->call(UnidadMedidaSeed::class);
        $this->call(PresentacionProductosSeed::class);
        $this->call(ImpuestosSeed::class);
        $this->call(MovimientosSeed::clas);
    }
}
