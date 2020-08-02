<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return view('welcome');
});

Route::get('/posts', 'PostsController@index');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update');
Route::get('/posts/{post}/delete', 'PostsController@delete');
Route::delete('/posts/{post}/delete', 'PostsController@destroy');

Auth::routes();
   
