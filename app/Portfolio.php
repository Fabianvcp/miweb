<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{


    protected $dates = ['published_at'];

    protected $appends = ['published_date'];
    //
}
