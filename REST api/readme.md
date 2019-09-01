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
7. Create data using resources in the user resource file. Set up the json result as data using Laravel's resource facility. Wrap Json result in a parent. The parent of the json feed is called data and is easier to work with. The user resource file takes information from the database and transforms it into an array.
8.  Add the resource into the controller (make sure you reference the resource file at the top of the controller file.
9. Create functions for the various endpoints (i.e. index, post, put etc.) in the user controller file. store, update and delete endpoints
10. Versioning



Files
======

App > providers > RouteServiceProvider.php This file specifies the routes for APIs in the map API routes section, contains code 
for login and also specifies the prefix for API urls 

Routes > api.php

App > user.php this is the user model

App > http > controllers > user controller.php this file contains the functions for showing users using parameters and returning a 
resource. Create a public function which will create a user and store the record.

App > http > resources > userResource.php

App > http > resources >userResourceCollection.php. Use this file for the index route which returns all records and enter the paginate in the return statement to paginate the json results.  urls will be provided in the results relating to each page of data.


database > factories > UserFactory.php this file enters fake data into the database

database > migrations > create_users_table.php

database > seeds > UserTableSeeder.php

database > seeds > databaseSeeder.php

N.b. instead of individually listing a get route and using the function name in the api.php file to reference the section in the 
user controller file, you can use api resource to group api resources with just the name of the controller
e.g. Route::apiResource('/user' 'userController'); 

N.b. You can amend the return code in the user resource file to return specific fields instad of the whole array.  Comment out the line relating to array and add

return [
'first_name' => $this->first_name,
'last_name' -> $this->last_name ]

Doing this will then only return the first and last name information from the array.

N.b. versioning - if you make changes to any keys the user controller, routes and resource collection would all need to be updated. You would need to update the api and users who are using the api will see that it breaks. Therefore it is a good idea to use versioning for apis so that you can maintain old and new versions. Move these file to a folder called version, create a route prefix (e.g. /v1) so that users can easily see in the url which version they are using.  This url is written in the api.php file  
