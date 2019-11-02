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
    return view('layout.main');
});

Route::get('/pruebax', function () {
    return view('history.PhysiciansNote');
});

Route::get('edit', function () {return view('edit_patient');});


Route::get('renderView', 'ScreenSeccion@index');
Route::get('find', 'DataController@busca');
Route::get('list', 'DataController@multifind');
Route::get('flexlist', 'DataController@fleXmultifind');
Route::get('findbyId', 'DataController@findbyId');
Route::post('store', 'DataController@almacena');
Route::post('IDstore', 'DataController@IDstore');
Route::post('delete', 'DataController@borra');
Route::get('patientcng', 'DataController@ChangePatient');

