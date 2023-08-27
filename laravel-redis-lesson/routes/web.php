<?php

use App\Events\UserSignedUp;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Fascades\Redis;
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

Route::get('/', function () {

    event(new UserSignedUp('JohnDoe'));

    return view('welcome');

    /*$data = [
        'event' => 'UserSignedUp',
        'data' => [
            'username' => 'JohnDoe'
        ]
        ];


        Redis::publish('test-channel', json_encode($data));

        return view('welcome');*/
   // Cache::put('foo', 'bar', 10);
   // return Cache::get('foo');

   
        // EXAMPLE USING REDIS
//Redis::set('name', 'mary');
//return Redis::get('name');

   // return view('welcome');
});
