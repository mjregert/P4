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

// Routes for user authentication
Auth::routes();
