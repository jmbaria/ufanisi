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
Route::get('/jobs/create','JobController@create');
Route::post('/jobs/post','JobController@store');
Route::get('/jobs','JobController@index');
Route::get('/jobs/{id}/view','JobController@show');
Route::get('/jobs/{id}/edit','JobController@edit');
Route::post('/jobs/apply','JobController@apply');

// Jobseeker
Route::get('/jobseeker/create','JobSeekerController@create');
Route::post('/jobseeker/post','JobSeekerController@store');
Route::get('/jobseeker/','JobSeekerController@index');

// Employer
Route::get('/jobs/applications','EmployerController@index');

// API
Route::get('/jobs/invite','JobController@invite');
Route::get('/jobs/reject','JobController@reject');

Auth::routes();

// Login
Route::get('/login','Auth\LoginController@login');

