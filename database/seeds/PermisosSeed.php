<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermisosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

Permission::create(['id' => 3,  'name'=>'Update roles', 'display_name'=> 'Actualizar Roles', 'guard_name'=> 'web',  'model'=> 'Roles']);
Permission::create(['id' => 4,  'name'=>'Delete roles', 'display_name'=> 'Eliminar Roles', 'guard_name'=> 'web',  'model'=> 'Roles']);
Permission::create(['id' => 5,  'name'=>'View roles',   'display_name'=> 'Ver Roles', 'guard_name'=> 'web',  'model'=> 'Roles']);
Permission::create(['id' => 6,  'name'=>'Create roles', 'display_name'=> 'Crear Roles', 'guard_name'=> 'web',  'model'=> 'Roles']);
Permission::create(['id' => 7,  'name'=>'Create users', 'display_name'=> 'Crear Usuarios', 'guard_name'=> 'web',  'model'=> 'Usuarios']);
Permission::create(['id' => 8,  'name'=>'View users',   'display_name'=> 'Ver Usuarios', 'guard_name'=> 'web',  'model'=> 'Usuarios']);
Permission::create(['id' => 9,  'name'=>'Delete users', 'display_name'=> 'Eliminar Usuarios', 'guard_name'=> 'web',  'model'=> 'Usuarios']);
Permission::create(['id' => 10, 'name'=> 'Update users', 'display_name'=> 'Actualizar Usuarios', 'guard_name'=> 'web',  'model'=> 'Usuarios']);
Permission::create(['id' => 15, 'name'=> 'View products', 'display_name'=> 'Ver Productos', 'guard_name'=> 'web',  'model'=> 'Productos']);
Permission::create(['id' => 16, 'name'=> 'Create products','display_name'=> 'Crear Productos', 'guard_name'=> 'web',  'model'=> 'Productos']);
Permission::create(['id' => 17, 'name'=> 'Update products',  'display_name'=> 'Actualizar Productos','guard_name'=> 'web',  'model'=> 'Productos']);
Permission::create(['id' => 18, 'name'=> 'Delete products', 'display_name'=> 'Eliminar Productos',  'guard_name'=> 'web',  'model'=> 'Productos']);
Permission::create(['id' => 19, 'name'=> 'View orders', 'display_name'=> 'Ver Ordenes', 'guard_name'=> 'web',  'model'=> 'Ordenes']);
Permission::create(['id' => 20, 'name'=> 'Update orders',  'display_name'=> 'Actualizar Ordenes',  'guard_name'=> 'web',  'model'=> 'Ordenes']);
Permission::create(['id' => 21, 'name'=> 'Delete orders',  'display_name'=> 'Eliminar Ordenes', 'guard_name'=> 'web',  'model'=> 'Ordenes']);
Permission::create(['id' => 22, 'name'=> 'Create orders',  'display_name'=> 'Crear Ordenes', 'guard_name'=> 'web',  'model'=> 'Ordenes']);
Permission::create(['id' => 23, 'name'=> 'Create invoice',  'display_name'=> 'Crear Facturas', 'guard_name'=> 'web',  'model'=> 'Facturas']);
Permission::create(['id' => 24, 'name'=> 'Create provider',  'display_name'=> 'Crear Proveedor', 'guard_name'=> 'web',  'model'=> 'Proveedores']);
Permission::create(['id' => 25, 'name'=> 'Delete provider',  'display_name'=> 'Eliminar Proveedor',  'guard_name'=> 'web',  'model'=> 'Proveedores']);
Permission::create(['id' => 26, 'name'=> 'Update provider',  'display_name'=> 'Actualizar Proveedor','guard_name'=> 'web',  'model'=> 'Proveedores']);
Permission::create(['id' => 27, 'name'=> 'View provider',  'display_name'=> 'Ver Proveedor', 'guard_name'=> 'web',  'model'=> 'Proveedores']);
Permission::create(['id' => 28, 'name'=> 'View category',  'display_name'=> 'Ver Categoria', 'guard_name'=> 'web',  'model'=> 'Categorias']);
Permission::create(['id' => 29, 'name'=> 'Create category',  'display_name'=> 'Crear Categoria', 'guard_name'=> 'web',  'model'=> 'Categorias']);
Permission::create(['id' => 30, 'name'=> 'Update category',  'display_name'=> 'Actualizar Categoria','guard_name'=> 'web',  'model'=> 'Categorias']);
Permission::create(['id' => 31, 'name'=> 'Delete category',  'display_name'=> 'Eliminar Categoria',  'guard_name'=> 'web',  'model'=> 'Categorias']);
Permission::create(['id' => 32, 'name'=> 'Delete laboratory','display_name'=> 'Eliminar Laboratorio','guard_name'=> 'web',  'model'=> 'Laboratorios']);
Permission::create(['id' => 33, 'name'=> 'Create laboratory','display_name'=> 'Crear Laboratorio', 'guard_name'=> 'web',  'model'=> 'Laboratorios']);
Permission::create(['id' => 34, 'name'=> 'Update laboratory','display_name'=> 'Actualizar Laboratorio','guard_name'=> 'web',  'model'=> 'Laboratorios']);
Permission::create(['id' => 35, 'name'=> 'View laboratory',  'display_name'=> 'Ver Laboratorio', 'guard_name'=> 'web',  'model'=> 'Laboratorios']);


    }
}

