<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	Role::create(['id'=>1, 'name'=>'Admin', 'display_name'=>'Administrador', 'guard_name'=>'web']);
	Role::create(['id'=>2, 'name'=>'Customer', 'display_name'=>'Customer', 'guard_name'=>'web']);
	Role::create(['id'=>3, 'name'=>'Usuario', 'display_name'=>'Usuario', 'guard_name'=>'web']);
	Role::create(['id'=>4, 'name'=>'Cliente', 'display_name'=>'Cliente', 'guard_name'=>'web']);
    }
}



