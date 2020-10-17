<?php

use App\Category_p;
use App\Portfolio;
use Illuminate\Database\Seeder;
use Psy\Util\Str;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::truncate();
        Category_p::truncate();


        $category = new Category_p;
        $category->name = "Categoría 1";
        $category->url = Str::slug($category->name);
        $category->save();

        $category = new Category_p;
        $category->name = "Categoría 2";
        $category->url = Str::slug($category->name);
        $category->save();
    }
}
