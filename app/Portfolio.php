<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Portfolio extends Model
{


    protected $dates = ['published_at'];

    protected $appends = ['published_date'];
    //

    /**
     * @return BelongsTo
     */
    public function category_p(){
        return $this->belongsTo(Category_p::class);
    }

}
