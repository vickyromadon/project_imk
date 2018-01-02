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

// user ----------------------------------------------------------------------------------
Route::get('/', 'UserController@getIndex');
Route::get('/howitwork', 'UserController@howitwork');
Route::get('/store/{name}', 'SellerController@getStore');
Route::post('/create_store/{id}', 'SellerController@createStore');
Route::get('/single/{id}', 'UserController@getSingle');
Route::get('/category/{id}', 'UserController@getCategory');
Route::get('/profile_store/{id}', 'SellerController@getProfileStore');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/profile/{id}', 'ProfileController@getProfile');
	Route::get('/profile/edit/{id}', 'ProfileController@getEditProfile')->name('profile.edit');
	Route::post('/profile/edit/biodata/{id}', 'ProfileController@changeBiodata');
	Route::post('/profile/edit/email/{id}', 'ProfileController@changeEmail');
	Route::post('/profile/edit/nohp/{id}', 'ProfileController@changeNoHp');
	Route::post('/profile/edit/password/{id}', 'ProfileController@changePassword');
	Route::post('/profile/edit/foto/{id}', 'ProfileController@changeFoto');

	Route::post('/rental/{id}', 'UserController@requestRental');
	Route::get('/history/{id}', 'UserController@getHistory');
});


// admin ----------------------------------------------------------------------------------
Route::group(['middleware' => 'admin'], function(){
	Route::get('/admin', 'AdminController@dashboard');
});

// seller ---------------------------------------------------------------------------------
Route::group(['middleware' => 'seller'], function(){
	Route::get('/seller', 'SellerController@dashboard');
	Route::match(['get', 'post'], '/seller/add_produk', 'SellerController@addProduk');
	Route::match(['get', 'post'], '/seller/list_produk', 'SellerController@getListProduk');
	Route::get('/seller/delete', 'SellerController@deleteProduk');
	Route::post('/seller/edit', 'SellerController@editProduk');
	Route::get('/seller/history/{id}', 'SellerController@getHistory');
	Route::post('/seller/history/action/{id}', 'SellerController@postHistory');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
