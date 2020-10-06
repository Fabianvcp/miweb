<?php

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
        //php artisan make:seeder nombredelatablacon"s"TableSeeder
         $this->call(PostsTableSeeder::class);
    }
}
