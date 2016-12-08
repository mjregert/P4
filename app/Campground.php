<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;
use App\Type;

class Campground extends Model
{
    public function reviews() {
        # Campground has many Reviews
        # Define a one-to-many relationship.
        return $this->hasMany('App\Review');
    }

    public function type() {
        # Campground has only one Type
        #Types can belong to many Campgrounds
        return $this->belongsTo('App\Type');
    }
}
