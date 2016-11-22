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

// Routes for the CRUD operations for Campsites
Route::get('/campsites',           'CampsiteController@index')->name('campsites.index');
Route::get('/campsites/create',    'CampsiteController@create')->name('campsites.create');
Route::post('/campsites',          'CampsiteController@store')->name('campsites.store');
Route::get('/campsites/{id}',      'CampsiteController@show')->name('campsites.show');
Route::get('/campsites/{id}/edit', 'CampsiteController@edit')->name('campsites.edit');
Route::put('/campsites/{id}',      'CampsiteController@update')->name('campsites.update');
Route::delete('/campsites/{id}',   'CampsiteController@destroy')->name('campsites.destroy');

// Routes for the CRUD operations for reviews
Route::get('/campsites/{id}/reviews',           'CampsiteController@index')->name('campsites.index');
Route::get('/campsites/{id}/reviews/create',    'CampsiteController@create')->name('campsites.create');
Route::post('/campsites{id}/reviews',           'CampsiteController@store')->name('campsites.store');
Route::get('/campsites/{id}/reviews/{id}',      'CampsiteController@show')->name('campsites.show');
Route::get('/campsites/{id}/reviews/{id}/edit', 'CampsiteController@edit')->name('campsites.edit');
Route::put('/campsites/{id}/reviews/{id}',      'CampsiteController@update')->name('campsites.update');
Route::delete('/campsites/{id}/reviews/{id}',   'CampsiteController@destroy')->name('campsites.destroy');

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
