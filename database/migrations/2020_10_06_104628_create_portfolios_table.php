<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{

    /**
     *
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //titulo
            $table->string('url'); //url
            $table->text('portada')->nullable(); //url
            $table->text('body')->nullable(); //contenido
            $table->text('iframe')->nullable();//videos o musica
            $table->string('link')->nullable(); //link del proyecto
            $table->timestamp('published_at')->nullable(); //fecha de creación
            $table->mediumText('category_p_id')->nullable(); //categoria_id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
