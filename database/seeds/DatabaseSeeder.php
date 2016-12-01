<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CampgroundsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }
}
