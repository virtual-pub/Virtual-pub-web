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


        Route::group(['prefix'=>'cervejas'], function() {
                
                Route::get('ativar/{id}', 'CervejaController@ativar')->name('cervejas.ativar');
                Route::get('foto/{id}', 'CervejaController@foto') ->name('cervejas.foto');
                Route::post('foto/store', 'CervejaController@storefoto')->name('cervejas.store.foto');
                
        });
Route::resource('admin/cervejas', 'CervejaController');
Route::get('api/cerveja/{id}', 'CervejaController@webServiceId');

// Social Auth
Route::prefix('oauth')->group(function() {
        Route::get('/social', 'Auth\SocialAuthController@show')->name('social.login');
        Route::get('/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
        Route::get('/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');
});




        









