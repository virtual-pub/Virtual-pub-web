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

// Social Auth
Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::resource('cervejas', 'CervejaController');
Route::get('api/cervejas/{id?}', 'CervejaController@webServiceId');
Route::get('api/cervejas', 'CervejaController@webServiceAll');

Route::get('ativar/{id}', 'CervejaController@ativar')
        ->name('cervejas.ativar');

Route::get('cervejaspesq', 'CervejaController@search')
        ->name('cervejas.search');
Route::post('cervejasfiltro', 'CervejaController@filtro')
        ->name('cervejas.filtro');

Route::get('cervejafoto/{id}', 'CervejaController@foto')
        ->name('cervejas.foto');
Route::post('cervejasfotostore', 'CervejaController@storefoto')
        ->name('cervejas.store.foto');