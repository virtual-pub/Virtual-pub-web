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

// Cervejas
Route::resource('admin/cervejas', 'CervejaController');
Route::prefix('admin/cervejas')->group(function() {
        Route::get('/relatorio', 'CervejaController@grafCervejaEstilo')->name('cervejas.graf');
        Route::get('/ativar/{id}', 'CervejaController@ativar')->name('cervejas.ativar');
        Route::get('/pesquisa', 'CervejaController@search')->name('cervejas.search');
        Route::post('/filtro', 'CervejaController@filtro')->name('cervejas.filtro');
        Route::get('/foto/{id}', 'CervejaController@foto')->name('cervejas.foto');
        Route::post('/fotostore', 'CervejaController@storefoto')->name('cervejas.store.foto');
});

// Estilos
Route::resource('config/estilos', 'EstiloController');
Route::prefix('config/estilos')->group(function() {
        
});


// Social Auth
Route::prefix('oauth')->group(function() {
        Route::get('/social', 'Auth\SocialAuthController@show')->name('social.login');
        Route::get('/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
        Route::get('/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');
});

Route::get('api/cervejas/{id?}', 'CervejaController@webServiceId');
Route::get('api/cervejas', 'CervejaController@webServiceAll');
