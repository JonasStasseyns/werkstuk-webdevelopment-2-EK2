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
Route::get('/projects/{id}', ['uses' =>'ProjectsController@detail']);
Route::get('/create-project', 'ProjectsController@create');
Route::post('/projects/', 'ProjectsController@store');
Route::get('/projects/category/{cat}', 'ProjectsController@category');
Auth::routes();

Route::get('/news', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@detail');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account', 'AccountController@index');
Route::post('/account', 'AccountController@updateImage');
Route::post('/account/update', 'AccountController@updateEmail');

Route::get('/about', 'ContentController@about');
Route::get('/privacypolicy', 'ContentController@privacy');
Route::get('/contact', function(){ return view('contact', ['sent' => false]); });
Route::post('/contact', 'ContentController@contact');

Route::get('/credits', 'CreditsController@index');
Route::get('/credits/buy/{amount}', ['uses' =>'CreditsController@purchase']);

Route::get('/donate/{id}', ['uses' => 'DonationsController@index']);
Route::get('/donate/{id}/{amount}', ['uses' => 'DonationsController@donate']);

Route::post('/comment/{type}/{id}', ['uses' => 'CommentsController@comment']);