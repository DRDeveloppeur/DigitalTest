<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/search', 'SearchController@index')->name('search');

Route::get('/film/{id}', 'MovieController@index')->name('movie');

Route::get('/search/{name}/{page}', 'SearchController@index')->name('movies');

Route::post('/send/comment', 'CommentsController@store')->name('new-comment');

Route::get('/comment/{id}', 'CommentsController@delete')->name('destroy-comment');

Route::post('/send/rating', 'RatingsController@newRating')->name('new-rating');
