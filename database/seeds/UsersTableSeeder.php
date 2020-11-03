<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $admin = new User;
        $admin->name = 'Administrador';
        $admin->email = 'admin@admin.com';
        $admin->password = '123123';
        $admin->save();
        $admin->assignRole('Admin');

        $writer = new User;
        $writer->name = 'Fabian Alejandro';
        $writer->email = 'gallardofabianvcpz@gmail.com';
        $writer->password = '7284';
        $writer->save();
        $writer->assignRole('Writer');
    }
}
