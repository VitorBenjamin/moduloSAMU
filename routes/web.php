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
Auth::routes();
Route::get('/', function () {
	return view('/home');
});


Route::get('/home', 'HomeController@index');

// Rotas dos Chamados
Route::post('/chamado/store', 'ChamadoController@store');	
Route::get('chamado', 'ChamadoController@index');
Route::get('chamado/create', 'ChamadoController@create');
Route::put('/edit/{id}', ['uses'=>'ChamadoController@edit', 'as'=>'chamados.edit']);
Route::get('/destroy/{id}', ['uses'=>'ChamadoController@destroy', 'as'=>'chamados.destroy']);
Route::get('/detalhe/{id}', ['uses'=>'ChamadoController@detalhe', 'as'=>'chamados.detalhe']);
Route::get('chamado/show/{idCham}', 'ChamadoController@show');
Route::get('chamado/showTwo/{idCham}', 'ChamadoController@showTwo');
Route::post('chamado/update/{idCham}', 'ChamadoController@update');

    //Rotas para aterar
Route::get('chamado/updateTwo/{fila}/{id}', 'ChamadoController@updateTwo');
Route::get('chamado/updateTree/{resolvedor}/{id}', 'ChamadoController@updateTree');
Route::get('chamado/updateFour/{statuscham}/{id}', 'ChamadoController@updateFour');
Route::get('chamado/updateFive/{prioridade}/{id}', 'ChamadoController@updateFive');


/*ROTAS PARA FILAS*/
Route::get('fila', 'FilasController@index');
Route::get('fila/create', 'FilasController@create');
Route::post('fila/store', 'FilasController@store');
Route::post('fila/update/{id}', 'FilasController@update');
Route::get('fila/edit/{id}', 'FilasController@edit');
Route::get('fila/show/{id}', 'FilasController@show');
Route::get('fila/destroy/{id}', 'FilasController@destroy');