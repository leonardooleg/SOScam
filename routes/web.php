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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/have-video', 'HaveVideoController', ['as' => 'admin']);

    Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment'], function () {
        Route::resource('/user', 'UserController', ['as' => 'admin.user_managment']);
    });
});

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/greeting', 'WelcomeController@greeting')->name('greeting');


Route::get('/have-video', 'HaveVideoController@index')->name('HaveVideo');
Route::get('/search-video', 'SearchVideoController@index')->name('SearchVideo');

Route::get('/have-video/{slug?}', 'HaveVideoController@video')->name('ShowHaveVideo');
Route::get('/search-video/{slug?}', 'SearchVideoController@video')->name('ShowSearchVideo');

Route::get('/greeting', 'WelcomeController@greeting')->name('greeting');


Route::get('/sos-cam', 'SOSController@sos')->name('SOScam');
Route::get('/have-sos-cam', 'SOSController@have')->name('haveSOScam');

Route::get('/home', 'HomeController@index')->name('home');

/*DB::listen(function($query) {
    var_dump($query->sql, $query->bindings);
});*/
Auth::routes();
