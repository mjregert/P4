<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campground;

class Review extends Model
{
    public function campground() {
        # Review belongs to Campground
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Campground');
    }
}
