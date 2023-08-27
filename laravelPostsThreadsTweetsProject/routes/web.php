<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

N.b the order of the routes matters otherwise the show method will be called. ->name('update');
|
*/

Route::get('/', function () {
     return view('welcome');
});

Route::get('/home', function () {
     return view('home');
});

Route::get('/contact', function () {
     return view('contact.contact');
});

Route::post('/contact', 'PagesController@postContact' );

               // THREADS

Route::get('/threads', 'ThreadsController@index');
Route::get('/threads/create', 'ThreadsController@create');
Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');
Route::delete('threads/{channel}/{thread}', 'ThreadsController@destroy');
Route::post('/threads', 'ThreadsController@store');
Route::get('/threads/{channel}', 'ThreadsController@index');

Route::patch('/replies/{reply}', 'RepliesController@update');
Route::get('/threads/{channel}/{thread}/replies', 'RepliesController@index');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::delete('/replies/{reply}', 'RepliesController@destroy');

Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');

Route::post('replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');
// N.b separate profiles page used for threads functionality to avoid confusion with profile used for posts
Route::get('profilesthread/{user}', 'ProfilesThreadController@show')->name('profilethread');
Route::get('profilesthread/{user}/notifications', 'UserNotificationsController@index');
Route::delete('profilesthread/{user}/notifications/{notification}', 'UserNotificationsController@destroy');
// n.b. the above can all be collated in one resource as below
// Route::resource('threads', 'ThreadsController');

              // POSTS

Route::get('/posts', 'PostsController@index');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update');
Route::get('/posts/{post}/delete', 'PostsController@delete');
Route::delete('/posts/{post}/delete', 'PostsController@destroy');

Route::get('/tags', 'TagsController@index');


Route::post('/profiles/{user:username}/follow', 'FollowsController@store');
Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit');
//Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit')->middleware('can:edit,user');
Route::patch('/profiles/{user:username}', 'ProfilesController@update');
Route::get('/profiles/{user:username}', 'ProfilesController@show');

Route::get('/profiles/{user:username}', 'ProfilesController@show')->name('profile');

Route::get('full-text-search', 'Full_text_search_Controller@index');
Route::post('full-text-search/action', 'Full_text_search_Controller@action')->name('full-text-search.action');
Route::get('full-text-search/normal-search', 'Full_text_search_Controller@normal_search')->name('full-text-search.normal-search');

                   // NEWS TWEETS
Route::middleware('auth')->group(function() {
Route::get('/news', 'TweetsController@index');
Route::post('/news', 'TweetsController@store');
});








Auth::routes();
