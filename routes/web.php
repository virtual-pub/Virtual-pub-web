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

Route::get('cervejas/api/{id}', 'CervejaController@webServiceId');

Route::resource('cervejas', 'CervejaController');
Route::group(['prefix'=>'cervejas'], function() {
        Route::get('ativar/{id}', 'CervejaController@ativar')->name('cervejas.ativar');
        Route::get('foto/{id}', 'CervejaController@foto') ->name('cervejas.foto');
        Route::post('foto/store', 'CervejaController@storefoto')->name('cervejas.store.foto');
});

Route::resource('copos', 'CopoController');
Route::group(['prefix'=>'copos'], function() {
        Route::get('foto/{id}', 'CopoController@foto') ->name('copos.foto');
        Route::post('foto/store', 'CopoController@storefoto')->name('copos.store.foto');
});

Route::resource('posts', 'PostController');
Route::group(['prefix'=>'posts'], function() {
        Route::get('foto/{id}', 'PostController@foto') ->name('posts.foto');
        Route::post('foto/store', 'PostController@storefoto')->name('posts.store.foto');
});

Route::resource('estilos', 'EstiloController');
Route::resource('colors', 'ColorController');


Route::resource('users', 'UserController');
Route::group(['prefix'=>'users'], function() {
Route::get('isMantenedor/{id}', 'UserController@isMantenedor')->name('users.isMantenedor');
Route::get('isFabricante/{id}', 'UserController@isFabricante')->name('users.isFabricante');
Route::get('isUser/{id}', 'UserController@isUser')->name('users.isUser');
});
// Social Auth
Route::prefix('oauth')->group(function() {
        Route::get('/social', 'Auth\SocialAuthController@show')->name('social.login');
        Route::get('/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
        Route::get('/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');
});





        









