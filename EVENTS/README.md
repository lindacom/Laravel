Events
========
Larave's event service provider is located in vendor > laravel > src > illuminate > event > eventserviceprovider.php
Jobs
-----

Events
--------
An event is the action that took place in the system (eg. a product purchase) and contains that data that goes along with it. (key)

App > Jobs > events

In the event file add implements ShouldBroadcast after the class name
In the construct fumction of the event file you can pass parameters eg. $user. N.b. anything entered in this public method will be available 
once event is fired
In the broadcastOn function you specify the channel to use

Listeners
--------

A listener is classes that listen for events and react (value)

App > Jobs > listeners

In the listener file: 
Use the event at the top of the file
add implements ShouldQueue after the class name.
in the construct function of the listener file you can pass through a file system, mailer app etc. and use it in the handle function.

N.b. you can create events and listeners from the commandline - php artisan make:event, php artisan make:listener or alternatively use the event:generate command
which creates required files based on information contained in he event service provider file.



Event service provider
-------------------------

located in app > providers > eventServiceProvider.php

The file contains the class responsible for event handling. 

N.b You can use model or file system classes in this file (add to the top of the file)
Make an event and make a listener and then Add mappings for events and listeners in this file 

```
  protected $listen = [
               'App\Events\OrderStatusUpdated' => [
           'App\Listeners\orderNotification'
           ],
    ];
 ```

N.b for large projects when you can't anticipate what you will do in response to an event, make an announcement (that something took place) using implements
shouldBroadcast then register a listener.

Schedule an event
-----------------

1. Register the event in the eventserviceprovider file. N.b. You can also register listeners in this file.

2. To fire an event from the routes.php file

```
Route::get('/', function () {
event (new EventName);
return view ('welcome);
});

```

Displatching an event
---------------------

Chron jobs
=============

The app > console > kernel.php schedules chron jobs. 
Use php artisan make command to schedule a worker to do the job and use the kernel file to schedule the frequency.
