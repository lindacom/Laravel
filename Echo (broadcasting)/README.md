Laravel Echo
=============

Laravel Echo allows users to subscribe to events that have been broadcast to the server.  
It allows you to communicate between the server and the client side in real time.
It allows you to respond to events behind the scenes without the user having to refresh the page.

Private channels
-----------------
For sensitive data a private channel should be used.

1. In the event file import use illuminate\Broadcasting\PrivateChannel at the top of the file
2. In the Vue coponent file use window.Echo.private
3. In the routes > channels.php file specify who can have access to the private channel.

Create a project
================
1. In visual studio code open a terminal and create a project - laravel new <name> and Open the project folder
2. Open a terminal and install npm dependencies - npm install
3. Install composer dependencies - composer install
4. Generate a Laravel app key - php artisan key:generate
5. Install laravel/ui - composer require laravel/ui (this enables you to use Laravel authentication)
6. Install vue scaffolding - use the command php artisan ui vue --auth then npm install then npm run dev then composer dump-autoload
7. Configure database connection - in the config > database.php file specify default db connection. In the .env file enter host, user and password details for the database.
8. Make broadcast service provider available - in the config > app.php file uncomment BroadcastServiceProvider in the application service providers section of the file.

N.b. configuration for the broadcast service provider can be found in app > roviders > BroadcastServiceProvider.php file.  
This file registers routes and loads routes > channels.php

N.b. the routes > channels.php file confirms whether a user is authorised to listen to the channel

N.. you can run the command php artisan route:list to see available routes. (e.g. post request to broadcasting/auth)

Dispatch an event to a log file
================================
1. In the config > broadcasting.php file select log as the default driver (other available drivers are pusher, redis etc)
2. In th .env file specify BROADCAST_DRIVER=log
3. Create an event file - php artisan make:event <name>. A new file will be created in a new App > Events folder. 
In the new file illuinate\Broadcasting\Channel will be imported at the top of the file.  Y
4. In the event file specify that the class implements ShouldBroadcast and in the broadcaston method specify the default public channel 
e.g. return new Channel('orders');

N.b. ShouldBroadcast uses the broadcastOn method which by default assumes that you are using a private channel.

N.b. In laravel > framework > src > illuminate > broadcasting directory you can see files relating to all other available channels.

You have now configured so that when the event is fired it will broadcast to the client side on the channel name you have provided.

Fire an event
--------------
To fire an event (e.g. from a route in the routes > web.php file) 

1. in the routes > web.php file use App\Events\Eventname at the top of the file and write

```
Route::get('/', function() {
eventname::dispatch();
return view('welcome')
});
```

2. Run php artisan serve to open the project in a browser. an event will be fired and logged to the storage > log file.
3. View the log file - navigate to storage > log. The file will now have an entry for log that shows broadcast event on channl=el with an empty payload. ("socket":null)

N.b. anything defined in the event file (usually in the constructor method) as public will be accessible in the log file when the event is fired. (enter public $foo = 'bar'
in the file and see it returned in the event)

Dispatch an event using pusher
=============================

1. sign up to pusher - pusher.com and set up an app and make a note of the app keys
2. In Laravel in the broadcasting.php file enter the key details
3. In the .env file change broadcast driver to pusher and paste the key informatio at the bottom of the file.
4. to use pusher SDK you need to pull it in through composer - composer require pusher/pusher-php-server
5. Fire the event (e.g. by accessing the web route)
6. In the browser go to the pusher dashboard to see the sent event details.

Listen for pusher on the client side
-----------------------------------------

Listen for pusher on the client side using JavaScript and echo to listen for pusher event and log a message to the console.

1. npm install laravel-echo pusher-js

2. in the resources > assets > js > bootstrap.js file uncomment the echo related code. 

3. in the resources > assets > js > bootstrap.js file listen for the event in this file

```
window.Echo.Channel('orders')
.listen('orderStatusUpdated', e => {
console.log 'hello';
});
```

4. Pull the bootstrap.js file in using a script - In the view file pull in /js/app.js file in a script

N.b. Echo will look for csrf token in a meta name tag at the top of the view page.

