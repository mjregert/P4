<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'type' => 'FULL',
            'description' => 'RV Park or campground and full amenities'
        ]);

        DB::table('types')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'type' => 'BASIC',
            'description' => 'Campground with potable water and outhouses',
        ]);

        DB::table('types')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'type' => 'PRIMITIVE',
            'description' => 'Primitive or rugged with no amenities',
        ]);
    }
}
