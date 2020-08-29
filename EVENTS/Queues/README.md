A job can be handled synchronously (done straight away) or asynchronusly (queued up as a job).

Set up the environment
======================

Using redis

In the .env file change the queue_connection= to redis

using a database

N.b if you don't have redis you can alternatively use a database.  
Run the command php artisan queue:table to create a table then run php artisan migrate. This creates a jobs table.
run the job. This inserts a job into the database
run php artisan queue:work

Dispatch a job to a log file using redis
=============================

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
1. To create a job run php artisan make:job <name>.  This creates a new App\Jobs folder with a new file created. By default the class implements ShouldQueue. 

Nb using --sync after the filename in the make job command it wont go through a queue.
N.b. the job class can accept anyting in the constructor.  If you pass an eloquent model (e.g. user) it will be serialised (id) and unserialised (name) using the serializesmodels trait
  
2. Reference the job class in the web.php file

```
Route::get('/', function () {
dispatch(new <name>);
  return 'finished';
  })
  ```
  
  3. To use a worker run php artisan queue:work
  
  4. Run the job - open the page in the browser.
  
Restarting a queue from the comandline
=======================================
Run php artisan queue:restart to restart the queue and pick up any code changes that have been made.

Failed jobs
=============

1. In the job file throw an exception in the handle function 

2. To use a worker run php artisan queue:work

N.b. add --tries=3 to specify that the worker should try to run the job three times before recording a fail. you can also set a timeout.

N.b. You can set up a database to record jobs on the failed queue - php artisan queue:failed-table

N.b. to retry a job run  the following command using the id from the table or using all - php artisan queue:retry 1 and run queue worker again.

Laravel Horizon
===============

A UI for redis backed queue jobs. After installation it creates 

a config > horizon.php file.
a app > providers > horizonserviceprovider.php file
a vendor > horizon folder
