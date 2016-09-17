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

// Rotas dos Chamados
Route::group(['prefix' => 'chamado'], function() {

	Route::post('/store',['uses'=>'ChamadoController@store']);
	Route::get('/all',['uses'=>'ChamadoController@all', 'as'=>'chamados.all']);
	Route::get('/{$id}',['uses'=>'ChamadoController@show', 'as'=>'chamado.show']);
	Route::get('/edit/{id}', ['uses'=>'ChamadoController@edit', 'as'=>'chamado.edit']);
	Route::put('/update/{id}', ['uses'=>'ChamadoController@update', 'as'=>'chamado.update']);
	Route::get('/destroy/{id}', ['uses'=>'ChamadoController@destroy', 'as'=>'chamado.destroy']);
	Route::get('/detalhe/{id}', ['uses'=>'ChamadoController@detalhe', 'as'=>'chamado.detalhe']);

});