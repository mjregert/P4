<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

class Campground extends Model
{
    public function reviews() {
        # Campground has many Reviews
        # Define a one-to-many relationship.
        return $this->hasMany('App\Review');
    }
}
