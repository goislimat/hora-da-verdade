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

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'usuario'], function() {
        Route::get('', ['uses' => 'UserController@index', 'as' => 'index.usuario']);
        Route::get('novo/{recurso?}/{id?}', ['uses' => 'UserController@create', 'as' => 'novo.usuario']);
        Route::post('{recurso?}/{id?}', ['uses' => 'UserController@store', 'as' => 'armazenar.usuario']);

        Route::get('buscar', ['uses' => 'UserController@buscar', 'as' => 'buscar.usuario']);

        Route::get('{usuario}', ['uses' => 'UserController@show', 'as' => 'mostrar.usuario']);
        Route::get('{usuario}/editar', ['uses' => 'UserController@edit', 'as' => 'editar.usuario']);
        Route::put('{usuario}', ['uses' => 'UserController@update', 'as' => 'atualizar.usuario']);
        Route::delete('{usuario}', ['uses' => 'UserController@delete', 'as' => 'excluir.usuario']);
    });

    Route::group(['prefix' => 'curso'], function() {
        Route::get('', ['uses' => 'CursoController@index', 'as' => 'index.curso']);
        Route::get('novo', ['uses' => 'CursoController@create', 'as' => 'novo.curso']);
        Route::post('', ['uses' => 'CursoController@store', 'as' => 'armazenar.curso']);

        Route::get('buscar', ['uses' => 'CursoController@buscar', 'as' => 'buscar.curso']);

        Route::get('{curso}', ['uses' => 'CursoController@show', 'as' => 'mostrar.curso']);
        Route::get('{curso}/editar', ['uses' => 'CursoController@edit', 'as' => 'editar.curso']);
        Route::put('{curso}', ['uses' => 'CursoController@update', 'as' => 'atualizar.curso']);
        Route::delete('{curso}', ['uses' => 'CursoController@destroy', 'as' => 'excluir.curso']);
    });
    
    Route::group(['prefix' => 'disciplina'], function() {
        Route::get('', ['uses' => 'DisciplinaController@index', 'as' => 'index.disciplina']);
        Route::get('novo/{curso?}', ['uses' => 'DisciplinaController@create', 'as' => 'novo.disciplina']);
        Route::post('', ['uses' => 'DisciplinaController@store', 'as' => 'armazenar.disciplina']);

        Route::get('buscar', ['uses' => 'DisciplinaController@buscar', 'as' => 'buscar.disciplina']);

        Route::get('{disciplina}', ['uses' => 'DisciplinaController@show', 'as' => 'mostrar.disciplina']);
        Route::get('{disciplina}/editar', ['uses' => 'DisciplinaController@edit', 'as' => 'editar.disciplina']);
        Route::put('{disciplina}', ['uses' => 'DisciplinaController@update', 'as' => 'atualizar.disciplina']);
        Route::delete('{disciplina}', ['uses' => 'DisciplinaController@destroy', 'as' => 'excluir.disciplina']);

        Route::get('{disciplina}/professores', ['uses' => 'DisciplinaController@professores', 'as' => 'professores.disciplina']);
        Route::get('{disciplina}/alunos', ['uses' => 'DisciplinaController@alunos', 'as' => 'alunos.disciplina']);

        //------------------------------------------------------------------------------------------------------//

        Route::group(['prefix' => '{disciplina}/prova'], function() {
            Route::get('', ['uses' => 'ProvaController@index', 'as' => 'index.prova']);
            Route::get('novo', ['uses' => 'ProvaController@create', 'as' => 'novo.prova']);
            Route::post('', ['uses' => 'ProvaController@store', 'as' => 'armazenar.prova']);
            Route::get('{prova}', ['uses' => 'ProvaController@show', 'as' => 'mostrar.prova']);
            Route::get('{prova}/editar', ['uses' => 'ProvaController@edit', 'as' => 'editar.prova']);
            Route::put('{prova}', ['uses' => 'ProvaController@update', 'as' => 'atualizar.prova']);
            Route::delete('{prova}', ['uses' => 'ProvaController@destroy', 'as' => 'excluir.prova']);

            Route::get('{prova}/questao/create', ['uses' => 'QuestaoController@create', 'as' => 'novo.questao']);
            Route::post('{prova}/questao', ['uses' => 'QuestaoController@store', 'as' => 'armazenar.questao']);
            Route::get('{prova}/questao/{questao}', ['uses' => 'QuestaoController@show', 'as' => 'mostrar.questao']);
            Route::get('{prova}/questao/{questao}/editar', ['uses' => 'QuestaoController@edit', 'as' => 'editar.questao']);
            Route::put('{prova}/questao/{questao}', ['uses' => 'QuestaoController@update', 'as' => 'atualizar.questao']);
            Route::delete('{prova}/questao/{questao}', ['uses' => 'QuestaoController@destroy', 'as' => 'excluir.questao']);
        });

        //------------------------------------------------------------------------------------------------------//

        Route::get('{disciplina}/matricular', ['uses' => 'MatriculaController@matricularAluno', 'as' => 'matricular.aluno']);
        Route::get('{disciplina}/vincular', ['uses' => 'MatriculaController@vincularProfessor', 'as' => 'vincular.professor']);
        Route::post('{disciplina}/vincular', ['uses' => 'MatriculaController@vincular', 'as' => 'vincular.usuario']);
        Route::delete('{disciplina}/desvincular/{usuario}/{recurso?}', ['uses' => 'MatriculaController@desvincular', 'as' => 'desvincular.usuario']);
    });

});


Route::auth();

Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);
