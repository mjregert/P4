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
        $campground_id = Campground::where('name','=','Lyndon B. Johnson State Park')->pluck('id')->first();

        DB::table('reviews')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'username' => 'Codemonkey_42',
            'review' => 'This campground is awesome.  It has a great firepit for roasting marshmallows and it is FREE for all scouts',
            'campground_id' => $campground_id,
        ]);

        $campground_id = Campground::where('name','=','Lost Pines Boy Scout Camp')->pluck('id')->first();

        DB::table('reviews')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'username' => 'Codemonkey_42',
            'review' => 'This campground hasa great 60ft climbing tower which is really fun.  Some of the campsites can be a walk to the restrooms, but overall a great place to camp.',
            'campground_id' => $campground_id,
        ]);



    }
}
