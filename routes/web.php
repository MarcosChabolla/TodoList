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

Route::get('/todos', [
	'uses' => 'TodosController@index',
	'as'   => 'todos'
]);

Route::get('/new', [
    'uses' => 'PagesController@new'
]);

Route::get('/todo/delete/{id}', [
	'uses' => 'TodosController@delete',
	'as'   => 'todo.delete'		//important for method call in view
]);

Route::get('/todo/update/{id}', [
	'uses' => 'TodosController@update',
	'as'   => 'todo.update'		//important for method call in view
]);

Route::get('/todo/completed/{id}', [
	'uses' => 'TodosController@completed',
	'as'   => 'todo.completed'		//important for method call in view
]);

Route::post('/create/todo', [
    'uses' => 'TodosController@store'
]);

Route::post('/todo/save/{id}', [
    'uses' => 'TodosController@save',
    'as'   => 'todo.save'
 ]);