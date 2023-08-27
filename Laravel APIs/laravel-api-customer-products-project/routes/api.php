<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('polls','PollsController@index');
Route::get('polls/{id}','PollsController@show');
Route::post('polls','PollsController@store');
Route::put('polls/{poll}','PollsController@update');
Route::delete('polls/{poll}','PollsController@delete');

Route::any('errors','PollsController@errors');

Route::apiResource('questions','QuestionsController');

Route::get('polls/{poll}/questions','PollsController@questions');

// allows user to download a file
Route::get('files/get','FilesController@show');

// allows user to upload a file
Route::post('files/create','FilesController@create');


Route::group(['prefix' => 'v1'], function () {
Route::apiResource('/reviews','ReviewController');
Route::apiResource('/customers','ReviewController');
Route::apiResource('/products','ProductController');

Route::get('/products/{id}/reviews', 'ProductController@getReviews');
Route::get('/reviews/{id}/products', 'ReviewController@getProducts');



});





