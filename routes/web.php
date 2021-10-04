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
Route::group(['middleware' => 'auth'], function(){
Route::get('/shirodoras/welcome', 'ShirodorasController@welcome')->name('shirodoras.welcome');
Route::get('/shirodoras/home', 'ShirodorasController@home')->name('shirodoras.home');
Route::get('/shirodoras/searchrecruit','ShirodorasController@search')->name('shirodoras.searchrecruit');
Route::get('/shirodoras/new', 'ShirodorasController@new')->name('shirodoras.new');
Route::post('/shirodoras/create', 'ShirodorasController@create')->name('shirodoras.create');
Route::get('/shirodoras/{id}/edit', 'ShirodorasController@edit')->name('shirodoras.edit');
Route::post('/shirodoras/{id}/edit', 'ShirodorasController@update')->name('shirodoras.update');
Route::post('/shirodoras/{id}/delete', 'ShirodorasController@destroy')->name('shirodoras.delete');
Route::get('/shirodoras/mypage', 'ShirodorasController@mypage')->name('shirodoras.mypage');
Route::get('/shirodoras/{id}/detail', 'ShirodorasController@detail')->name('shirodoras.detail');
});