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

// AUTH
Route::post('/signup', 'UsuarioController@signUp');
Route::post('/login', 'UsuarioController@login');
Route::get('/logout', 'UsuarioController@logout');

// POST
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/feed', 'PostController@feed')->middleware('auth');
Route::post('/createpost', 'PostController@createPost')->middleware ( 'auth' );
Route::post('/createpostProfile', 'PostController@createpostProfile')->middleware ( 'auth' );
Route::get('/feed/deletepost/{post_id}', 'PostController@deletePost')->middleware ( 'auth' );
Route::get('/feed/editarpost/{post_id}', 'PostController@editarPost')->middleware('auth');
Route::post('/feed/atualiza/{post_id}', 'PostController@atualizar')->middleware('auth');
Route::view('lsPostProfile','listaPostProfile')->middleware('auth');

//PERFIL
Route::get('/perfil/{id?}', 'UsuarioController@perfil');
Route::post('/salvarmudancas', 'UsuarioController@salvarMudancas');

//PROFILE
Route::get('/profile', 'UsuarioController@profile');
Route::get('/profilePost', 'PostController@feedProfile')->middleware('auth');
Route::post('/createpostProfile', 'PostController@createpostProfile')->middleware ( 'auth' );
Route::get('/profile/deletepost/{post_id}', 'PostController@deletePostProfile')->middleware ( 'auth' );
Route::get('/profile/editarpost/{post_id}', 'PostController@editarPostProfile')->middleware('auth');





//FAQ
Route::get('/faq', 'UsuarioController@faq');

//PESQUISAS
Route::post('/pesquisaUsuarios','UsuarioController@pesquisaUsuario');


//SEGUIR
Route::post('/seguirPessoas', 'UsuarioController@seguirPessoas')->middleware('auth');