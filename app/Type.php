<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campground;

class Type extends Model
{
    public function campgrounds() {
        # Campground has only one Type
        # Types can belong to many Campgrounds
        # Define a one-to-many relationship.
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Campground')->withTimestamps();
    }
}
