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

Route::get('/', function(){
   return view("auth.login"); 
});
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth']], function () {
    //

Route::post('createAdmin', 'Auth\RegisterController@create');
Route::get('admin/find/{id}', 'Auth\RegisterController@find');
Route::put('admin/update/{id}', 'Auth\RegisterController@update');
Route::delete('admin/delete/{id}', 'Auth\RegisterController@delete');
Route::get('/home', 'HomeController@index');

//Route::get('register', 'HomeController@register');

Route::get('report', 'HomeController@report');

Route::get('column-chart', 'HomeController@columnChart');

Route::get('home/{fecha_inicio}/{fecha_fin}/{type}/reportFilter', 'HomeController@reportFilter');

Route::get('home/inputsreport', function(){
    return view("home.inputsreport"); 
});

Route::get('/movement', 'MovementController@index')->name('movimientos');

Route::post('addMovement', 'MovementController@store');

Route::get('listEnters', 'MovementController@listEnters');

Route::get('listExit', 'MovementController@listExit');

Route::get('listAll', 'MovementController@listAll');

Route::post('addPerson', 'PersonController@store');

Route::put('updatePerson/{id}', 'PersonController@update');

Route::delete('deletePerson/{id}', 'PersonController@delete');

Route::get('/personas', 'PersonController@index')->name('personas');

Route::get('listPeople', 'PersonController@listPeople');

Route::get('/personas/find/{id}', 'PersonController@findPerson');

Route::get('exportExcel/{fecha_inicio}/{fecha_fin}/{type}/export', 'HomeController@exportExcel');

Route::get('exportPDF/{fecha_inicio}/{fecha_fin}/{type}/export', 'HomeController@exportPDF');

Route::get('returnHome', 'HomeController@returnHome');

Route::get('/areas', 'PositionController@index')->name('areas');

Route::get('listPositions', 'PositionController@listPositions');

Route::post('addPosition', 'PositionController@store');

Route::get('/positions/find/{id}', 'PositionController@findPosition');

Route::put('/positions/updatePosition/{id}', 'PositionController@updatePosition');

Route::delete('deletePosition/{id}', 'PositionController@delete');

Route::get('listAdmins', 'Auth\RegisterController@listAdmins');

Route::get('/registrar', 'Auth\RegisterController@showRegistrationForm')->name('registrar');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});