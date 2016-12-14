<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', 'IndexController@index');

// auth routes
Auth::routes();

Route::get('/admin', 'HomeController@index');

/**
 * faculty routes
 */
Route::get('/admin/add-faculty', 'FacultiesController@index');
Route::post('/admin/add-faculty', 'FacultiesController@store');
Route::post('/admin/edit-faculty/{id}', 'FacultiesController@edit');
Route::post('/admin/update-faculty/{id}', 'FacultiesController@update');
Route::delete('/admin/delete-faculty/{id}', 'FacultiesController@destroy');

/**
 * department routes
 */
Route::get('/admin/add-department', 'DepartmentsController@index');
Route::post('/admin/add-department', 'DepartmentsController@store');
Route::post('/admin/edit-department/{id}', 'DepartmentsController@edit');
Route::post('/admin/update-department/{id}', 'DepartmentsController@update');
Route::delete('/admin/delete-department/{id}', 'DepartmentsController@destroy');

/**
 * discipline routes
 */
Route::get('/admin/add-discipline', 'DisciplineController@index');
Route::post('/admin/add-discipline', 'DisciplineController@store');
Route::post('/admin/edit-discipline/{id}', 'DisciplineController@edit');
Route::post('/admin/update-discipline/{id}', 'DisciplineController@update');
Route::delete('/admin/delete-discipline/{id}','DisciplineController@destroy');

/**
 * search routes
 */
Route::get('/admin/search-by-faculty/{faculty_id}', 'SearchController@searchForFaculty');
Route::get('/admin/search-by-department/{department_id}', 'SearchController@searchForDepartment');
Route::get('/search-by-faculty/{department_id}', 'SearchController@searchForFaculty');
Route::get('/search-by-department/{department_id}', 'SearchController@searchForDepartment');
