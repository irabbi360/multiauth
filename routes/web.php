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
Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');



Route::get('admin/home', 'AdminController@index');
//Route::get('');

//Route::get('auth/register', 'Auth\RegisterController@getRegister');
//Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@postRegister']);