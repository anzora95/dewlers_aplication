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

Route::get('/test', function () {
    return view('test');
});


//      Authentication routes
Auth::routes();



Route::middleware(['auth'])->group(function (){

//      GET REDIRECT
    Route::get('/home', 'IndexController@index');
    Route::get('/dashboard', 'IndexController@index');
    Route::get('/duelcreator', 'DuelController@index');
    Route::get('/status', 'DuelController@status');
    Route::get('/transactionmanager', 'UserController@tmanager');
    Route::get('/addcoins','UserController@addcoins'); //Para agregar monedas
    Route::get('/witness','UserController@witness');//Para ver los duelos donde se es Witness
    Route::get('/acepted/{id}', 'DuelController@acept_challenge');
    Route::get('/update_balance/{idduel}/{idwinner}/{idlosser}', 'DuelController@gamewinner');



//      POST
    Route::post('/saveduel', 'DuelController@store');
    Route::post('/savecoins', 'UserController@addcoins');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
