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

Auth::routes();

/*Route::get('/', function(){
   return view("home"); 
});*/

Route::get('/home', 'HomeController@index');

Route::get('register', 'HomeController@register');

Route::get('report', 'HomeController@report');

Route::get('column-chart', 'HomeController@columnChart');

Route::get('home/{fecha_inicio}/{fecha_fin}/{type}/reportFilter', 'HomeController@reportFilter');

Route::get('home/inputsreport', function(){
    return view("home.inputsreport"); 
});

Route::get('/movement', 'MovementController@index');

Route::post('addMovement', 'MovementController@store');

Route::get('listEnters', 'MovementController@listEnters');

Route::get('listExit', 'MovementController@listExit');

Route::get('listAll', 'MovementController@listAll');

Route::post('addPerson', 'PersonController@store');

Route::put('updatePerson/{id}', 'PersonController@update');

Route::delete('deletePerson/{id}', 'PersonController@delete');

Route::get('/personas', 'PersonController@index');

Route::get('listPeople', 'PersonController@listPeople');

Route::get('/personas/find/{id}', 'PersonController@findPerson');

Route::get('exportExcel/{fecha_inicio}/{fecha_fin}/{type}/export', 'HomeController@exportExcel');

Route::get('exportPDF/{fecha_inicio}/{fecha_fin}/{type}/export', 'HomeController@exportPDF');

Route::get('returnHome', 'HomeController@returnHome');

Route::get('/areas', 'PositionController@index');

Route::get('listPositions', 'PositionController@listPositions');

Route::post('addPosition', 'PositionController@store');

Route::get('/positions/find/{id}', 'PositionController@findPosition');

Route::put('/positions/updatePosition/{id}', 'PositionController@updatePosition');

Route::delete('deletePosition/{id}', 'PositionController@delete');

//Route::get('load/person/data', 'PersonController@loadData')->name('load.person.data');
