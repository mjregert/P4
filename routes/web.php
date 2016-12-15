<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Main route and the entry point for the application
Route::get('/', 'PageController')->name('page.index');

// Routes for the CRUD operations for campgrounds

Route::get('/campgrounds',             'CampgroundController@index')->name('campground.index');
Route::get('/campgrounds/create',      'CampgroundController@create')->name('campground.create');
Route::post('/campgrounds',            'CampgroundController@store')->name('campground.store');
Route::get('/campgrounds/{id}',        'CampgroundController@show')->name('campground.show');
Route::get('/campgrounds/{id}/edit',   'CampgroundController@edit')->name('campground.edit');
Route::put('/campgrounds/{id}',        'CampgroundController@update')->name('campground.update');
Route::get('/campgrounds/{id}/delete', 'CampgroundController@delete')->name('campground.delete');
Route::delete('/campgrounds/{id}',     'CampgroundController@destroy')->name('campground.destroy');

// Routes for the CRUD operations for reviews

Route::get('/campgrounds/{id}/reviews/create',    'ReviewController@create')->name('review.create');
Route::post('/campgrounds/{id}/reviews',           'ReviewController@store')->name('review.store');
//Route::get('/campgrounds/{id}/reviews/{id}',      'ReviewController@show')->name('review.show');
//Route::get('/campgrounds/{id}/reviews/{id}/edit', 'ReviewController@edit')->name('review.edit');
//Route::put('/campgrounds/{id}/reviews/{id}',      'ReviewController@update')->name('review.update');
//Route::delete('/campgrounds/{id}/reviews/{id}',   'ReviewController@destroy')->name('review.destroy');

/*
| Temporary Debug Route
*/
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database campmonkey');
        DB::statement('CREATE database campmonkey');

        return 'Dropped campmonkey; created campmonkey.';
    });

};

Auth::routes();

/*Route::get('/home', 'HomeController@index');*/
