<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campgrounds', function (Blueprint $table) {
            # Increments method will make a Primary, Auto-Incrementing field.
            # Most tables start off this way
            $table->increments('id');

            # This generates two columns: `created_at` and `updated_at` to
            # keep track of changes to a row
            $table->timestamps();

            # The rest of the fields...
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('campsites');
            $table->boolean('restrooms');
            $table->decimal('fees');

            $table->string('address');
            $table->string('city');
            $table->char('state',2);
            $table->integer('zipcode');

            # FYI: We're skipping the 'tags' field for now; more on that later.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campgrounds');
    }
}
