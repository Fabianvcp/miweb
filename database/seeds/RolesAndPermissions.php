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
        Permission::create(['name' => 'Create users']);
        Permission::create(['name' => 'View users']);
        Permission::create(['name' => 'Update users']);
        Permission::create(['name' => 'Delete users']);

        Permission::create(['name' => 'Create roles']);
        Permission::create(['name' => 'View roles']);
        Permission::create(['name' => 'Update roles']);
        Permission::create(['name' => 'Delete roles']);

        Permission::create(['name' => 'Create permissions']);
        Permission::create(['name' => 'View permissions']);
        Permission::create(['name' => 'Update permissions']);
        Permission::create(['name' => 'Delete permissions']);

        Permission::create(['name' => 'Create posts']);
        Permission::create(['name' => 'View posts']);
        Permission::create(['name' => 'Update posts']);
        Permission::create(['name' => 'Delete posts']);



        // create roles and assign created permissions

        // this can be done as separate statements


        $role= Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        // or may be done by chaining
        $moderador= Role::create(['name' => 'Admin']);
        $moderador->givePermissionTo(Permission::all());


        $write = Role::create(['name' => 'Writer']);
        $write->givePermissionTo('Create posts');
        $write->givePermissionTo('Update posts');
        $write->givePermissionTo('Delete posts');
        $write->givePermissionTo('View posts');

//        $role= Role::create(['name' => 'super-admin']);
//        $role->givePermissionTo(Permission::all());
    }

}
