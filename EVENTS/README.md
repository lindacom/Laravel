Events
========

An event is the action that took place in the system (eg. a product purchase) and contains that data that goes along with it. (key)

A listener is classes that listen for events and react (value)

App > Jobs > events
App > Jobs > listeners

Events are located in app > providers > eventServiceProvider.php

The file contains the class responsible for event handling. N.b You can use model or file system classes in this file (add to the top of the file)
Make an event and make a listener and then Add mappings for events and listeners in this file 

N.b for large projects when you can't anticipate wha you will do in response to an event, make an announcement (that something took place) then register a listener.

Steps:
Register the event in the eventserviceprovider file

To fire an event from the routes.php file

```
Route::get('/', function () {
event (new EventName);
return view ('welcome);
});

```

Chron jobs
=============

The app > console > kernel.php schedules chron jobs. Use php artisan make command to schedule a worker to do the job and use the kernel file to schedule the frequency.
