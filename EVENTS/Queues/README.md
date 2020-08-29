A job can be handled synchronously (done straight away) or asynchronusly (queued up as a job).

In the .env file change the queue_connection= to redis

e.g. in the web.php file enter the following code

```
Route::get('/', function () {
dispatch(function () {
logger('hello there');
});

return 'finished';
});
```

N.b. Although the word finishd will be displayed in the browser no entries will be created in the log file until you assign a worker.

A job is carried out by a worker.  To use a worker run php artisan queue:work

Delayed job execution
---------------------
It is also possible to delay a job.

```
Route::get('/', function () {
dispatch(function () {
logger('hello there');
})->delay(now()->addMinutes(2));

return 'finished';
});
```

N.b. even if you use a worker the job will not display in the log file until after the delay period. You can also delay in days.

Create a job from the commandline
==================================
To create a job run php artisan make:job <name>.  This creates a new App\Jobs folder with a new file created. By default the class implements ShouldQueue. Nb using --sync after the filename in the make job command it wont go through a queue
  
Run the job

Route::get('/', function () {
dispatch(new <name>);
  return 'finished';
  })
