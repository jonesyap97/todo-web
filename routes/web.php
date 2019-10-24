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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/home', function (Request $request) {
//     return view('home');
// });

//refer app\Http\Controllers\Controller.php 

use App\Http\Controllers\TodoController;


Route::get('/test/{id}','TodoController@index');
Route::get('/welcome','TodoController@welcome');

Route::name('home')->get('/','TodoController@index');
Route::name('create')->get('/create','TodoController@create');
Route::name('store')->post('/store','TodoController@store');
Route::name('delete')->get('/delete/{todo}','TodoController@delete');
Route::name('edit')->get('/edit/{todo}','TodoController@edit');
Route::name('update')->post('update/{todo}','TodoController@update');
