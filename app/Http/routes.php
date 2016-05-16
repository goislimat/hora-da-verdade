<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'usuario'], function() {
        Route::get('', ['uses' => 'UserController@index', 'as' => 'index.usuario']);
        Route::get('novo', ['uses' => 'UserController@create', 'as' => 'novo.usuario']);
        Route::post('', ['uses' => 'UserController@store', 'as' => 'armazenar.usuario']);
        Route::get('{usuario}', ['uses' => 'UserController@show', 'as' => 'mostrar.usuario']);
        Route::get('{usuario}/editar', ['uses' => 'UserController@edit', 'as' => 'editar.usuario']);
        Route::put('{usuario}', ['uses' => 'UserController@update', 'as' => 'atualizar.usuario']);
        Route::delete('{usuario}', ['uses' => 'UserController@delete', 'as' => 'excluir.usuario']);
        Route::post('buscar', ['uses' => 'UserController@buscar', 'as' => 'buscar.usuario']);
    });

    Route::group(['prefix' => 'curso'], function() {
        Route::get('', ['uses' => 'CursoController@index', 'as' => 'index.curso']);
        Route::get('novo', ['uses' => 'CursoController@create', 'as' => 'novo.curso']);
        Route::post('', ['uses' => 'CursoController@store', 'as' => 'armazenar.curso']);
        Route::get('{curso}', ['uses' => 'CursoController@show', 'as' => 'mostrar.curso']);
        Route::get('{curso}/editar', ['uses' => 'CursoController@edit', 'as' => 'editar.curso']);
        Route::put('{curso}', ['uses' => 'CursoController@update', 'as' => 'atualizar.curso']);
        Route::delete('{curso}', ['uses' => 'CursoController@destroy', 'as' => 'excluir.curso']);
        Route::post('buscar', ['uses' => 'CursoController@buscar', 'as' => 'buscar.curso']);
    });
    
    Route::group(['prefix' => 'disciplina'], function() {
        Route::get('', ['uses' => 'DisciplinaController@index', 'as' => 'index.disciplina']);
        Route::get('novo', ['uses' => 'DisciplinaController@create', 'as' => 'novo.disciplina']);
        Route::post('', ['uses' => 'DisciplinaController@store', 'as' => 'armazenar.disciplina']);
        Route::get('{disciplina}', ['uses' => 'DisciplinaController@show', 'as' => 'mostrar.disciplina']);
        Route::get('{disciplina}/editar', ['uses' => 'DisciplinaController@edit', 'as' => 'editar.disciplina']);
        Route::put('{disciplina}', ['uses' => 'DisciplinaController@update', 'as' => 'atualizar.disciplina']);
        Route::delete('{disciplina}', ['uses' => 'DisciplinaController@destroy', 'as' => 'excluir.disciplina']);
        Route::post('buscar', ['uses' => 'DisciplinaController@buscar', 'as' => 'buscar.disciplina']);
    });

});


Route::auth();

Route::get('/home', 'HomeController@index');
