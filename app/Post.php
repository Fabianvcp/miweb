<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title','url','body','excerpt','published_at','category_id','iframe','user_id'
    ];
    protected $dates = ['published_at'];

    protected $appends = ['published_date'];

    protected static function  boot()
    {
        parent::boot();
        static::deleting(function ($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }
    public function getRouteKeyName()
    {
        return 'url';
    }

    //
    public function category() // $post->category->name
    {
        //retonarme este post-> que pertenece a una categoria
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {   //Pertenece a muchos
        return $this->belongsToMany(Tag::class);

    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }
public function owner(){
        return $this->belongsTo(User::class, 'user_id');
}
    /**
     * @param $query
     */
    public function scopePublished($query){
       $query->whereNotNull('published_at')
           ->where('published_at', '<=', Date('Y-m-d H:i:s'))
           ->latest('published_at');

    }
    public function scopeAllowed($query){

        if (auth()->user()->hasRole('Admin')|| auth()->user()->hasRole('Super-admin'))
        {
            return $query;
        }else{
            return $query->where('user_id',auth()->id());
        }

    }


    //si esta publicado?
    public function isPublished(){

        return ! is_null($this->published_at) && $this->published_at < today();
    }

    public static function create(array $attributes =[])
    {
        $attributes['user_id'] = auth()->id();
        $post = static::query()->create($attributes);
        $post->generateUrl();
        return $post;
    }

    public  function generateUrl()
    {
        $url = Str::slug($this->title);
        if($this->where('url', $url)->exists()){

            $url ="{$url}.-{$this->id}";

        }

        $this->url = $url;
        $this->save();
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at']=Carbon::parse($published_at);

    }

    public function  setCategoryIdAttribute($category){
        $this->attributes['category_id']=Category::find( $category) ? $category : Category::create([ 'name' => $category])->id;
    }
    public  function  syncTags($tags){
        $tagIds = collect($tags)->map(function ($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag ])->id;
        });
       return $this->tags()->sync($tags);
    }

}
