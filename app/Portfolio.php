<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Portfolio extends Model
{
    protected $fillable = [
        'title','url','body','excerpt','published_at','category_id'
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



}
