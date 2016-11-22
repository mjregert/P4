<?php

use Illuminate\Database\Seeder;

class CampgroundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campgrounds')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'LJB Ranch',
            'description' => 'Free scout campground',
            'campsites' => 42,
            'restrooms' => true,
            'fees' => 39.99,
            'address' => '123 Somewhere Street',
            'city' => 'Johnson City',
            'state' => 'TX',
            'zipcode' => 78665,
        ]);
    }
}
