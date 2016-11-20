<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('/noticia/listar','NoticiaController@listarNoticia')->name('listarNoticias')->middleware('can:listar,App\Noticia');
Route::get('/noticia/cadastrar', 'NoticiaController@cadastrarNoticia')->middleware('can:create,App\Noticia');
Route::post('/noticia/gravar', 'NoticiaController@gravarNoticia')->middleware('can:create,App\Noticia');
Route::get('/noticia/alterar/{id}','NoticiaController@alterarNoticia');
Route::delete('/noticia/deletar','NoticiaController@deletarNoticia');
