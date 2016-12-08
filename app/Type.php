<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campground;

class Type extends Model
{
    public function campgrounds() {
        # Campground has only one Type
        #Types can belong to many Campgrounds
        return $this->hasMany('Campground');
    }
}
