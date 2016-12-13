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

Route::get('/', 'IndexController@index');

// Маршруты аутентификации...
Auth::routes();

Route::get('/admin', 'HomeController@index');


/**
 * faculty routes
 */
Route::get('/admin/add-faculty', 'FacultiesController@index');
Route::post('/admin/add-faculty', 'FacultiesController@store');
Route::get('/admin/edit-faculty', 'FacultiesController@getData');
Route::post('/admin/edit-faculty', 'FacultiesController@edit');
Route::delete('/admin/delete-faculty', 'FacultiesController@destroy');

/**
 * department routes
 */
Route::get('/admin/add-department', 'DepartmentsController@index');
Route::post('/admin/add-department', 'DepartmentsController@store');
Route::get('/admin/edit-department', 'DepartmentsController@getData');
Route::post('/admin/edit-department', 'DepartmentsController@edit');
Route::delete('/admin/delete-department', 'DepartmentController@destroy');


/**
 * discipline routes
 */
Route::get('/admin/add-discipline', 'DisciplineController@index');
Route::post('/admin/add-discipline', 'DisciplineController@store');
Route::get('/admin/edit-discipline', 'DisciplineController@getData');
Route::post('/admin/edit-discipline', 'DisciplineController@edit');
Route::delete('/admin/delete-discipline','DisciplineController@destroy');
