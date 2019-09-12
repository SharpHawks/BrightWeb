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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@test');

Route::match(['get', 'post'], '/admincp/login', 'Admin\LoginController@index')->name('adminLogin');

Route::group(['prefix' => 'admincp', 'middleware' => 'is_admin', 'namespace' => 'Admin'], function () {
		Route::get('/', 'HomeController@index')->name('adminHome');
		Route::get('/logout', 'HomeController@logout')->name('adminLogout');
		Route::get('/users', 'UsersController@index')->name('users.index');
		Route::post('/users', 'UsersController@store')->name('users.store');
		Route::get('/users/create', 'UsersController@create')->name('users.create');
		Route::get('/users/delete/{user}', 'UsersController@destroy')->name('users.destroy');
		Route::get('/users/edit/{user}', 'UsersController@edit')->name('users.edit');
    Route::post('/users/update/{user}', 'UsersController@update')->name('users.update');
		Route::get('/users/show/{user}', 'UsersController@show')->name('users.show');
    Route::get('/users/import-export', 'UsersController@importExport')->name('users.importExport');
		Route::post('/users/import', 'UsersController@import')->name('users.import');
		Route::get('/users/export', 'UsersController@export')->name('users.export');
});