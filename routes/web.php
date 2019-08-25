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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create','TaskController@create');
Route::post('/store','TaskController@store');
Route::get('/tasks', 'TaskController@index');
Route::get('/show-task/{id}','TaskController@show');
Route::get('/edit/task/{id}','TaskController@edit');
Route::post('/edit/task/{id}','TaskController@update');
//Route::delete('/delete/task/{id}','TaskController@destroy');
Route::get('/delete/task/{id}','TaskController@destroy');
