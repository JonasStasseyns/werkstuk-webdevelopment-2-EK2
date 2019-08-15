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

Route::get('/', 'ProjectsController@homepage');
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects/', 'ProjectsController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account', 'AccountController@index');
Route::post('/account', 'AccountController@updateImage');

Route::get('/about', 'ContentController@about');
Route::get('/privacypolicy', 'ContentController@privacy');
Route::get('/contact', function(){ return view('contact'); });

Route::get('/credits', 'CreditsController@index');
Route::get('/credits/buy/{amount}', ['uses' =>'CreditsController@purchase']);