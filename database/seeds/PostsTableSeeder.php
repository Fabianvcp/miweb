<?php

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //aqui adentro creamos los post de prueba
        /*
         * Crea la variable $post y decimos que es igual a una nueva instancia
         *  de la clase POST
         * */
                Post::truncate(); //para que limpie la tabla post y luego cree los datos
                Category::truncate();


                $category = new Category;
                $category->name = "Categoria 1";
                $category->save();

                $category  = new Category;
                $category ->name = "Categoria 2";
                $category ->save();

                $post = new Post;
                $post->title = "Mi primer post";
                $post->excerpt = "Extracto de mi primer post";
                $post->body = "<p>Contenido de mi primer post</p>";
                $post->published_at = Carbon::now()->subDay(4);
                $post->category_id = 1;
                $post->save();


                $post = new Post;
                $post->title = "Mi segundo post";
                $post->excerpt = "Extracto de mi segundo post";
                $post->body = "<p>Contenido de mi segundo post</p>";
                $post->published_at = Carbon::now()->subDay(3);
                $post->category_id = 2;
                $post->save();


                $post = new Post;
                $post->title = "Mi tercero post";
                $post->excerpt = "Extracto de mi tercero post";
                $post->body = "<p>Contenido de mi tercero post</p>";
                $post->published_at = Carbon::now()->subDay(2);
                $post->category_id = 1;
                $post->save();


                $post = new Post;
                $post->title = "Mi cuarto post";
                $post->excerpt = "Extracto de mi cuarto post";
                $post->body = "<p>Contenido de mi cuarto post</p>";
                $post->published_at = Carbon::now()->subDay(1);
                $post->category_id = 2;
                $post->save();

    }
}
