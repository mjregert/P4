<?php

use Illuminate\Database\Seeder;
use App\Campground;


class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campground_id = Campground::where('name','=','LJB Ranch')->pluck('id')->first();

        DB::table('reviews')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'username' => 'Codemonkey_42',
            'review' => 'This campground is awesome.  It has a great firepit for roasting marshmallows and it is FREE for all scouts',
            'star_rating' => 5,
            'campground_id' => $campground_id,
        ]);
    }
}
