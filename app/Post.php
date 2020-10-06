<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $dates = ['published_at'];

    protected $appends = ['published_date'];

    //
    public function category() // $post->category->name
    {
        //retonarme este post-> que pertenece a una categoria
        return $this->belongsTo(Category::class);
    }
}
