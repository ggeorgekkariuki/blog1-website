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

// The Post Controller

Route::get('/', 'PostController@index')->name('home');

Route::get('/posts/{post}', 'PostController@show');

Route::get('/create/create', 'PostController@create');

Route::post('/posts', 'PostController@store' );

//The Comments Controller

Route::post('/posts/{post}/comments ','CommentsController@store');

//The Registration Controller
Route::get('/register','RegistrationController@create');
Route::post('/register ','RegistrationController@store');


//The Login/ Session Controller
Route::get('/login','SessionController@create')->name('login');
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');
