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

Route::get('/team','TeamController@index');
Route::get('/group','GroupController@index');
Route::post('/draw','GroupController@draw');
Route::get('/standing','GroupController@standing');
Route::get('/fixture','FixtureController@fixture');
