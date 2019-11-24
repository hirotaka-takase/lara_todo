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

use App\Http\Middleware\CheckSession;

Route::get('/', 'BasicController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@store');
Route::get('/posts/{post}', 'HomeController@about');
Route::get('/posts/{post}/edit', 'HomeController@edit');
Route::put('/posts/{post}', 'HomeController@update');
Route::delete('/posts/{post}', 'HomeController@delete');
