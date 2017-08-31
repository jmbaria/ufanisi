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


// Jobs
Route::get('/','JobController@index');
Route::get('/jobs/create',['middleware' => 'auth', 'uses' => 'JobController@create']);
Route::post('/jobs/post',['middleware' => 'auth', 'uses' => 'JobController@store']);
Route::get('/jobs','JobController@index');
Route::get('/jobs/{id}/view',['middleware' => 'auth', 'uses' => 'JobController@show']);
Route::get('/jobs/{id}/edit',['middleware' => 'auth', 'uses' => 'JobController@edit']);
Route::post('/jobs/apply','JobController@apply');

// Jobseeker
Route::get('/jobseeker/create','JobSeekerController@create');
Route::post('/jobseeker/post','JobSeekerController@store');
Route::get('/jobseeker/',['middleware' => 'auth', 'uses' => 'JobSeekerController@index']);
Route::get('/jobseeker/{id}/view',['middleware' => 'auth', 'uses' => 'JobSeekerController@show']);

// Employer
Route::get('/jobs/applications',['middleware' => 'auth', 'uses' => 'EmployerController@index']);

// API
Route::get('/jobs/invite','JobController@invite');
Route::get('/jobs/reject','JobController@reject');

// Login
Route::get('/login','UsersController@login');
Route::get('/logout','UsersController@logout');
Route::post('/user/login','UsersController@authenticate');

Route::get('login', ['as' => 'login', 'uses' => 'UsersController@login']);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');