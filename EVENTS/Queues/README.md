A job can be handled synchronously (done straight away) or asynchronusly (queued up as a job).

e.g. in the web.php file enter the following code

```
Route::get('/', function () {
dispatch(function () {
logger('hello there');
});

return 'finished';
});

N.b. Although the word finishd will be displayed in the browser no entries will be created in the log file until you assign a worker.

A job is carried out by a worker.  To use a worker run php artisan queue:work
