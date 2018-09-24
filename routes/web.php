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

Route::post('/cursos/busquedaAvanzada', 'CursoController@index');
Route::get('/cursos/{curso_id}/inscripcion', 'CursoController@inscripcion');
Route::post('/cursos/{curso_id}/inscribirme', 'CursoController@inscribirme');
Route::resource('cursos', 'CursoController');


Route::resource('empresas', 'CursoController');


Route::get('/ofertas/{oferta_id}/validacion', 'OfertasController@validacion');
Route::get('/ofertas/{oferta_id}/validar', 'OfertasController@validar');


Route::get('/ofertas/{oferta_id}/inscripcion', 'OfertasController@inscripcion');
Route::post('/ofertas/{oferta_id}/inscribirme', 'OfertasController@inscribirme');
Route::post('/ofertas/busquedaAvanzada', 'OfertasController@index');
Route::resource('ofertas', 'OfertasController');


Route::resource('empresas', 'EmpresaController');

