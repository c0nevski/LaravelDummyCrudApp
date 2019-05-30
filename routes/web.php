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

// Display the landing page
Route::get('/', 'PagesController@home')->name('landingpage');

// Dummy static page
Route::get('/about', 'PagesController@about')->name('about');


// Resource routes from the auth scaffold
Auth::routes();


// Show all tasks
Route::get('/home', 'TasksController@index')->name('show_tasks');
// Add a new task
Route::get('/tasks/new', 'TasksController@create')->name('add_task');
// Show a single task by id
Route::get('/tasks/{id}', 'TasksController@show')->name('show_single_task');
// Edit task by id
Route::get('/tasks/edit/{id}', 'TasksController@edit')->name('edit_task');

// Save task
Route::post('/tasks', 'TasksController@store')->name('store_task');

// Update/Edit task
Route::put('/tasks/{id}', 'TasksController@update')->name('update_task');

// Delete/Destroy task
Route::delete('tasks/{id}', 'TasksController@destroy')->name('delete_task');



