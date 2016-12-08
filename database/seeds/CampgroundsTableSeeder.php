<?php

use Illuminate\Database\Seeder;
use App\Type;

class CampgroundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_id = Type::where('type','=','FULL')->pluck('id')->first();

        DB::table('campgrounds')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Lyndon B. Johnson State Park',
            'description' => 'The Resource Education Center (Scout Hut).  Facility for scout groups only.  Available for day or overnight use.',
            'campsites' => 20,
            'fees' => 0.00,
            'address' => '1472 State Park Road 52',
            'city' => 'Stonewall',
            'state' => 'TX',
            'zipcode' => 78671,
            'type_id' => $type_id,
        ]);

        $type_id = Type::where('type','=','FULL')->pluck('id')->first();

        DB::table('campgrounds')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Lost Pines Boy Scout Camp',
            'description' => 'DOK’s Tower, Fishing, Field Sports Ranges, Aquatics Center/Pool',
            'campsites' => 400,
            'fees' => 20.00,
            'address' => '785 FM 1441',
            'city' => 'Bastrop',
            'state' => 'TX',
            'zipcode' => 78602,
            'type_id' => $type_id,
        ]);

        $type_id = Type::where('type','=','BASIC')->pluck('id')->first();

        DB::table('campgrounds')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Camp Alma McHenry',
            'description' => '250 acres of pastureland, oak trees and several private stocked fishing ponds.  About a 90 minute drive from Austin.  Primitive-style camping; no defined campsites.  Drinking water is not available, bring your own water.  Bathroom facilities not available, portable toilet only.',
            'campsites' => 50,
            'fees' => 5.00,
            'address' => 'Co Rd 121',
            'city' => 'Giddings',
            'state' => 'TX',
            'zipcode' => 78942,
            'type_id' => $type_id,
        ]);
    }
}
