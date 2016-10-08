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

// Rotas Admin
Route::group(['prefix'=>'admin','as' =>'admin.', 'middleware' => 'auth.checkrole:admin' ],function(){

    // Rotas Clientes
    Route::group(['prefix'=>'clientes', 'as' =>'clientes.'],function(){
        Route::get('', ['as' => 'index', 'uses' => 'UsersController@index']);
        Route::get('nova', ['as' => 'nova', 'uses' => 'UsersController@nova']);
        Route::post('salvar', ['as' => 'salvar', 'uses' => 'UsersController@store']);
        Route::get('editar/{id}', ['as' => 'editar', 'uses' => 'UsersController@edit']);
        Route::get('excluir/{id}', ['as' => 'excluir', 'uses' => 'UsersController@excluir']);
        Route::post('alterar/{id}', ['as' => 'alterar', 'uses' => 'UsersController@update']);
    });

    // Rotas Categoria
    Route::group(['prefix'=>'categorias', 'as' =>'categorias.'],function(){
        Route::get('', ['as' => 'index', 'uses' => 'CategoriesController@index']);
        Route::get('nova', ['as' => 'nova', 'uses' => 'CategoriesController@nova']);
        Route::post('salvar', ['as' => 'salvar', 'uses' => 'CategoriesController@store']);
        Route::get('editar/{id}', ['as' => 'editar', 'uses' => 'CategoriesController@edit']);
        Route::get('excluir/{id}', ['as' => 'excluir', 'uses' => 'CategoriesController@excluir']);
        Route::post('alterar/{id}', ['as' => 'alterar', 'uses' => 'CategoriesController@update']);
    });



});

// Rotas Clientes
Route::group(['prefix'=>'cliente','as' =>'cliente.', 'middleware' => 'auth.checkrole:cliente' ],function(){
    // Rotas Clientes
    Route::group(['prefix'=>'perfil', 'as' =>'perfil.'],function(){
        Route::get('altera', ['as' => 'altera', 'uses' => 'UsersController@perfil']);
        Route::post('gravar/{id}', ['as' => 'gravar', 'uses' => 'UsersController@gravar']);
    });
});