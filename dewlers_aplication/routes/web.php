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

Route::get('/datepicker', function () {
    return view('teste_picker');
});

Route::get('/review_duel', function () {
    return view('Duels/duels_review');
});
//      Authentication routes
Auth::routes();


Route::get('/date', function () {
    return view('Duels/date');
});


Route::middleware(['auth'])->group(function (){

//      GET REDIRECT
    Route::get('/home', 'IndexController@index');
    Route::get('/dashboard', 'IndexController@index_tables');
    Route::get('/duelcreator', 'DuelController@index');
    Route::get('/status', 'DuelController@status');
    Route::get('/transactionmanager', 'UserController@tmanager');
    Route::get('/addcoins','UserController@addcoins'); //Para agregar monedas
    Route::get('/witness','UserController@witness');//Para ver los duelos donde se es Witness
    Route::get('/acepted/{id}', 'DuelController@acept_challenge');
    Route::get('/update_balance/{idduel}/{idwinner}/{idlosser}', 'DuelController@gamewinner');
    Route::get('/double_or_nothing/{id}/','Post_Controller@don_reduel');
    Route::get('/acepted_don/{id}/','DONController@acept_don');
    Route::get('send', 'UserController@mail');
    Route::post('/witn_validate', 'UserController@witness_contract');
    Route::post('/nowith', 'UserController@witness_refuse');


    Route::get('mail', function () {
        $order = App\duels::find(1);

        return (new App\Notifications\StatusUpdate($order))
            ->toMail($order->user);
    });




//      POST
    Route::post('/saveduel', 'DuelController@store');
    Route::post('/savecoins', 'UserController@addcoins');

    Route::post('/re_duel', 'DONController@save_don'); //actualiza el duelo segun el ID

    Route::get('posts', 'Post_Controller@posts')->name('posts');

    Route::post('posts', 'Post_Controller@postPost')->name('posts.post');

    Route::get('posts/{id}', 'Post_Controller@show')->name('posts.show');

//    Route::get('posts/{id}', 'Post_Controller@show')->name('posts.show');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
