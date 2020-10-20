<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Portfolio extends Model
{
    protected $fillable = [
        'title','url','body','excerpt','published_at','category_id','iframe'
    ];

    protected $dates = ['published_at'];

    protected $appends = ['published_date'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    /**
     * @return BelongsTo
     */
    public function category_p(){
        return $this->belongsTo(Category_p::class);
    }

    public function fotos(){
        return $this->hasMany(Foto::class);
    }

    /**
     * @param $query
     */
    public function scopePublished($query){
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Date('Y-m-d H:i:s'))
            ->latest('published_at');

    }
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = Str::slug($title);
    }
    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at']=Carbon::parse($published_at);
    }

    public function  setCategoryPIdAttribute($category_p){
        $this->attributes['category_p_id']=Category_p::find( $cat = $category_p) ? $cat : Category_p::create(['name' => $cat])->id;
    }



}
