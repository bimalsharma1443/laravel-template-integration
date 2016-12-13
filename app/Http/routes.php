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

//Route::auth();

//Route::get('/home', 'HomeController@index');

//Route::get('city',[
//   'uses' => 'CityController@index',
//]);


Route::get('/login', 'LoginController@index');

Route::post('/auth', 'LoginController@auth');

Route::get('/logout', 'LoginController@logout');

Route::get('/register', 'LoginController@register');

Route::post('/create/member', 'LoginController@createMember');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/form', 'OperationController@add');

Route::get('/list', 'OperationController@index');

Route::post('/create', 'OperationController@create');

Route::get('/edit/{id}', 'OperationController@edit');

Route::post('/update/{id}', 'OperationController@update');

Route::get('/delete/{id}', 'OperationController@delete');

Route::post('/ajax', 'OperationController@ajax');