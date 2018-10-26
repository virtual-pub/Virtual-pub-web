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

Route::get('users/{id}', 'UserController@show')->name('profile.show');

Route::get('/post', 'PostController@indexP');
Route::post('/like','PostController@postLikePost')->name('like');

Route::post('users/{profileId}/follow', 'UserController@followUser')->name('user.follow');
Route::post('/{profileId}/unfollow', 'UserController@unFollowUser')->name('user.unfollow');

Route::post('cervejas/{profileId}/favoritar', 'CervejaController@favoritarCerveja')->name('cerveja.favoritar');
Route::post('/{profileId}/desfazer', 'CervejaController@desfazerFavoritar')->name('cerveja.desfazer');

Route::post('busca/cerveja', 'CervejaController@pesq')->name('busca.cerveja');
Route::post('busca/users', 'UserController@pesq')->name('busca.user');
Route::get('cervejas-favoritas', 'CervejaController@fav');

Route::get('feed', 'PostController@feed')->name('feed');
Route::get('user-seguidores', 'UserController@seguidores')->name('seguidores');
Route::get('user-seguidos', 'UserController@seguidos')->name('seguidos');

Route::get('busca/estilo', 'CervejaController@estiloShow')->name('estilo.view');
Route::post('busca/estilo/{id?}', 'CervejaController@estiloPesq')->name('estilo.filtro');
Route::get('busca/copo', 'CervejaController@copoShow')->name('copo.view');
Route::post('busca/copo/{id?}', 'CervejaController@copoPesq')->name('copo.filtro');
Route::get('busca/cor', 'CervejaController@corShow')->name('cor.view');
Route::post('busca/cor/{id?}', 'CervejaController@corPesq')->name('cor.filtro');




Route::post('avaliação', 'CervejaController@avaliacao')->name('cerveja.rating');



        









