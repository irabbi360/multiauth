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

Route::get('ki', 'KiController@fileCopy');
Route::post('file-upgrading', 'KiController@fileUpgrading')->name('fileUpgrading');


Route::get('create', 'KiController@create')->name('create');
Route::post('store', 'KiController@store')->name('store');

Route::get('/send', 'EmailController@send');


//Route::get('');

//Route::get('auth/register', 'Auth\RegisterController2@getRegister');
//Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\RegisterController2@postRegister']);