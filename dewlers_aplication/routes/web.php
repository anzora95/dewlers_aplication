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


//      Authentication routes
Auth::routes();



Route::middleware(['auth'])->group(function (){

//      GET REDIRECT
    Route::get('/home', 'IndexController@index');
    Route::get('/dashboard', 'IndexController@index');
    Route::get('/duelcreator', 'DuelController@index');
    Route::get('/status', 'DuelController@status');

//      POST
    Route::post('/saveduel', 'DuelController@store');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
