<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'pagescontroller@show_all');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::post('add','pagescontroller@store');
Route::post('getAllTodos','pagescontroller@getAllTodos');

Route::get('delete/{id}','pagescontroller@destroy');

Route::post('state/{id}','pagescontroller@state');

Route::get('update/{id}','pagescontroller@update');
