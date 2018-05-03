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

//admin
Route::prefix('admin')->group(function() {
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
});


// Social Auth
Route::prefix('oauth')->group(function() {
        Route::get('/social', 'Auth\SocialAuthController@show')->name('social.login');
        Route::get('/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
        Route::get('/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');
});


Route::resource('cervejas', 'CervejaController');
Route::get('api/cervejas/{id?}', 'CervejaController@webServiceId');
Route::get('api/cervejas', 'CervejaController@webServiceAll');

Route::get('cervejasgraf', 'CervejaController@grafCervejaEstilo')
        ->name('cervejas.graf');

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
