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



Route::get('/',['uses'=> 'Auth\AuthController@getIndex', 'as'=> '/']);
// RUTAS DE AUTENTICACION
Route::get('login',['uses'=> 'Auth\AuthController@getLogin', 'as'=> 'login']);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout',['uses'=>'Auth\AuthController@getLogout', 'as'=> 'logout']);



/*

Route::get('/', function () {
    return view('index');
});
*/



Route::resource('contrato', 'ContratoController');


//busqueda


Route::post('contrato/buscar',['uses'=>'ContratoController@find', 'as'=> 'buscarElemento']);

//DEscarga word

Route::post('contrato/word',['uses'=>'ContratoController@downloadWORD', 'as'=> 'descargarContrato']);

//definir roles de usuario