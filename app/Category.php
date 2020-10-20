<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded=[];
    public function getRouteKeyName()
    {
        return 'url';
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }

    //accesores por parametro recivimos el atributto que queremos modificar
    //no modifica en la base de dato pero si como lo recive
//    public function getNameAttribute($name)
//    {
//        return ($name);
//    }
    //mutador funciona con set, esto quiere decir que el valor name, al ingresar lo va transformar
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }



}
