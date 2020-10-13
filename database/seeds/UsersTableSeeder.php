<?php

use App\User;
use Illuminate\Database\Seeder;

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
        $admin->password = bcrypt('123123');
        $admin->save();


        $writer = new User;
        $writer->name = 'Fabian Alejandro';
        $writer->email = 'gallardofabianvcpz@gmail.com';
        $writer->password = bcrypt('7284');
        $writer->save();
    }
}
