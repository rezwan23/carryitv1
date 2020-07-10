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

Route::get('/', 'HomeController@home')->name('homepage');

Auth::routes();


Route::group(['middleware' => ['auth', 'mobileVerified']], function(){
    Route::resource('carrier-post', 'CarrierController');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::resource('request-post', 'RequestPostController');
    Route::get('/profile', 'DashboardController@profile')->name('profile');
    Route::post('/profile', 'DashboardController@saveProfile');
    Route::get('/assign/{post}', 'DashboardController@assign')->name('assign');
    Route::post('/assign/{post}', 'DashboardController@storeAssign')->name('carrier-post-assign');
    Route::get('/assign/all/get', 'DashboardController@assignRequests')->name('carry.request');
    Route::get('/assign/{carry}/accept', 'DashboardController@assignAccept')->name('assign.accept');
});
Route::resource('carrier-post', 'CarrierController');
Route::get('get-policestations', 'CarrierController@getPoliceStations');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::post('/search', 'HomeController@showResult')->name('search');

Route::get('/unverified', 'DashboardController@unverified')->name('unverified');
Route::post('/unverified', 'DashboardController@verify')->name('verify.mobile');
Route::get('/receive', 'HomeController@receiveShowForm')->name('receive.form');
Route::post('/receive', 'HomeController@receive');
