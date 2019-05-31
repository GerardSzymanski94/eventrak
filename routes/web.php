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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api-test', 'ApiTestController@index')->name('api-test')->middleware('admin');
Route::post('register_post', 'Auth\RegisterController@register_post')->name('register_post');
Auth::routes();
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/select_address', 'Auth\RegisterController@select_address')->name('select_address');
Route::prefix('user_info')->name('user_info.')->group(function () {
    Route::get('/user_info', 'UserInfoController@index')->name('info');
    Route::post('/update/{userInfo}', 'UserInfoController@update')->name('update');
});
Route::prefix('photo')->name('photo.')->group(function () {
    Route::get('/photo', 'PhotoController@index')->name('index')->middleware('user');
    Route::get('/add', 'PhotoController@create')->name('add')->middleware('user');
    Route::post('/store', 'PhotoController@store')->name('store')->middleware('user');
    Route::post('/update/{user}', 'PhotoController@update')->name('update')->middleware('user');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'AdminController@index')->name('index')->middleware('admin');
    Route::get('/add', 'AdminController@create')->name('add')->middleware('admin');
    Route::post('/store', 'AdminController@store')->name('store')->middleware('admin');
    Route::get('/import', 'AdminController@import')->name('import')->middleware('admin');
    Route::get('/ranking', 'AdminController@ranking')->name('ranking')->middleware('admin');
    Route::get('/rating/{user}', 'AdminController@rating')->name('rating')->middleware('admin');
});
