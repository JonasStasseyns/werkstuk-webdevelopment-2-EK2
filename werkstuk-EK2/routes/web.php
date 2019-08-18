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
Route::get('/create-project', 'ProjectsController@create')->middleware('auth');
Route::post('/projects/', 'ProjectsController@store')->middleware('auth');
Route::get('/projects/category/{cat}', 'ProjectsController@category');
Route::get('/projects/edit/{id}', 'ProjectsController@edit')->middleware('auth');
Route::post('/projects/edit/update', 'ProjectsController@update')->middleware('auth');
Route::get('/projects/featurize/{id}', 'ProjectsController@featurizeIndex')->middleware('auth');
Route::post('/projects/featurize', 'ProjectsController@featurize')->middleware('auth');
Auth::routes();

Route::get('/news', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@detail');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account', 'AccountController@index')->middleware('auth');
Route::post('/account', 'AccountController@updateImage')->middleware('auth');
Route::post('/account/update', 'AccountController@updateEmail')->middleware('auth');

Route::get('/about', 'ContentController@about');
Route::get('/privacypolicy', 'ContentController@privacy');
Route::get('/contact', function(){ return view('contact', ['sent' => false]); });
Route::post('/contact', 'ContentController@contact');

Route::get('/credits', 'CreditsController@index')->middleware('auth');
Route::get('/credits/buy/{amount}', ['uses' =>'CreditsController@purchase'])->middleware('auth');

Route::get('/donate/{id}', ['uses' => 'DonationsController@index'])->middleware('auth');
Route::get('/donate/{id}/{amount}', ['uses' => 'DonationsController@donate'])->middleware('auth');
Route::get('/projects/donations/{id}', ['uses' => 'DonationsController@donationList'])->middleware('auth');

Route::post('/comment/{type}/{id}', ['uses' => 'CommentsController@comment'])->middleware('auth');