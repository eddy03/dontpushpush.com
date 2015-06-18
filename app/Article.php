<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;

class Article extends Model
{

    //Mutators to ensure publish_at always nice and clean
    public function setPublishAtAttribute($date) {

        $this->attributes['publish_at'] = Carbon::parse($date);

    }

}
