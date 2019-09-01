Creating a REST API in Laravel for the users table
----------------------------------------------------

Steps
========

1. Make the API url a sub domain of the site. In the RouteServiceProvider file change the route prefix entry to route domain and in the .env file 
add a new key called API_DOMAIN with the value of the url of to be used for the api
2. Create a GET route for the API in the api.php file to route to the userController
3. Set up the users table in the database
4. Create a user model and create the migration and seeder files which will populate the database table
5. Create a userController file which will run from the route.
6. Make the API RESTFUL (which means using GET, POST, PUT (to update) and DELETE requests for users to easily access data)
7. Set up the json result as data using Laravel's resource facility. Wrap Json result in a parent. The parent of the json feed is called 
data and is easier to work with
8. Add the resource into the controller (make sure you reference the resource file at the top of the controller file.
9. Create functions for the various endpoints (i.e. index, post, put etc.) in the user controller file.



Files
======

App > providers > RouteServiceProvider.php This file specifies the routes for APIs in the map API routes section, contains code 
for login and also specifies the prefix for API urls 

Routes > api.php

App > user.php this is the user model

App > http > controllers > user controller.php this file contains the functions for showing users using parameters and returning a 
resource

User table migration

User table seeder

N.b. instead of individually listing a get route and using the function name in the api.php file to reference the section in the 
user controller file, you can use api resource to group api resources with just the name of the controller
e.g. Route::apiResource('/user' 'userController'); 
