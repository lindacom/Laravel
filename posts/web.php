<?php

use Illuminate\Support\Facades\Route;


Route::get('/{slug}', 'PostsController@show');
   
