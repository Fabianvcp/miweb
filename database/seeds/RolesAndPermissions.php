<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Permission::truncate();
        Role::truncate();
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Create users', 'display_name' => 'Crear usuario']);
        Permission::create(['name' => 'View users', 'display_name' => 'Ver usuario']);
        Permission::create(['name' => 'Update users', 'display_name' => 'Actualizar usuario']);
        Permission::create(['name' => 'Delete users', 'display_name' => 'Eliminar usuario']);

        Permission::create(['name' => 'Create roles', 'display_name' => 'Crear rol']);
        Permission::create(['name' => 'View roles', 'display_name' => 'Ver rol']);
        Permission::create(['name' => 'Update roles', 'display_name' => 'Actualizar rol']);
        Permission::create(['name' => 'Delete roles', 'display_name' => 'Eliminar rol']);

        Permission::create(['name' => 'Create permissions', 'display_name' => 'Crear permisos']);
        Permission::create(['name' => 'View permissions', 'display_name' => 'Ver permisos']);
        Permission::create(['name' => 'Update permissions', 'display_name' => 'Actualizar permisos']);
        Permission::create(['name' => 'Delete permissions', 'display_name' => 'Eliminar permisos']);

        Permission::create(['name' => 'Create posts', 'display_name' => 'Crear post']);
        Permission::create(['name' => 'View posts', 'display_name' => 'Ver post']);
        Permission::create(['name' => 'Update posts', 'display_name' => 'Actualizar post']);
        Permission::create(['name' => 'Delete posts', 'display_name' => 'Eliminar post']);



        // create roles and assign created permissions

        // this can be done as separate statements


        $role= Role::create(['name' => 'super-admin', 'display_name' => 'Super administrador']);
        $role->givePermissionTo(Permission::all());

        // or may be done by chaining
        $moderador= Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $moderador->givePermissionTo(Permission::all());


        $write = Role::create(['name' => 'Writer', 'display_name' => 'Escritor']);
        $write->givePermissionTo('Create posts');
        $write->givePermissionTo('Update posts');
        $write->givePermissionTo('Delete posts');
        $write->givePermissionTo('View posts');

//        $role= Role::create(['name' => 'super-admin']);
//        $role->givePermissionTo(Permission::all());
    }

}
