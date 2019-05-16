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
Route::get('/api-test', 'ApiTestController@index')->name('api-test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('user_info')->name('user_info.')->group(function () {
    Route::get('/user_info', 'UserInfoController@index')->name('info');
    Route::post('/update/{userInfo}', 'UserInfoController@update')->name('update');
});
Route::prefix('photo')->name('photo.')->group(function () {
    Route::get('/photo', 'PhotoController@index')->name('index');
    Route::get('/add', 'PhotoController@create')->name('add');
    Route::post('/store', 'PhotoController@store')->name('store');
    Route::post('/update/{user}', 'PhotoController@update')->name('update');
});
