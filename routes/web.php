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



Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	/*Route::get('/home', function(){
		return view('home');
	})->name('home');
	Route::get('/dashboard', function(){
		return view('dashboard');
	})->name('dashboard');*/

	Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function(){
	if (Auth::user()->admin == 0) {
		return view ('home');
	} else{
		$users['users'] = \App\User::all();
		return view('adminhome', $users);
	}
});
	
});

//Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');



//Route::get('admin/home', 'AdminController@index');
//Route::get('');

//Route::get('auth/register', 'Auth\RegisterController@getRegister');
//Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@postRegister']);