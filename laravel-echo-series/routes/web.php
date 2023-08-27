<?php

use App\Events\OrderStatusUpdated;
use App\Task;
use App\Events\TaskCreated;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
DISPATCHING EVENTS
*/

Route::get('/projects/{project}', function (Project $project) {
    $project->load('tasks');

    return view('projects.show', compact('project'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/projects/{project}', function (Project $project) {
    return $project->tasks->pluck('body');
});

Route::post('api/projects/{project}/tasks', function (Project $project) {
    $task = $project->tasks()->create(request(['body']));

    event(new TaskCreated($task));

    return $task;
});

class Order {
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}

Route::get('/', function () {
   
    return view('welcome');
});

Route::get('/update', function () {
    OrderStatusUpdated::dispatch(new Order(5));
});

Route::get('/tasks', function () {
    return Task::latest()->pluck('body');
});

Route::post('/tasks', function () {
 $task = Task::forceCreate(request(['body']));

    event (
        (new TaskCreated($task))->dontBroadcastToCurrentUser()
    );
});

Route::get('/home', 'HomeController@index')->name('home');
