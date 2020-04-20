Creating a REST API in Laravel for the users table
----------------------------------------------------
The api url (e.g. /api) is set in th app > providers > routeServiceProvider file

The api routes (e.g. GET) are set in the routes > api.php file

The api CRUD functions are stored in app > http > controllers > userController.php file

The api data format is configured in the app > http > resources > userResource.php file (and referenced in the controller file)

Steps
========

1. Make the API url a sub domain of the site. 

In the app > providers > RouteServiceProvider file Define the "api" routes for the application. (change the route prefix entry to route domain /api)
In the .env file add a new key called API_DOMAIN with the value of the url to be used for the api

2. Create a GET route for the API in the Routes > api.php file.  This route will point to the userController

N.b. instead of individually listing a get route and using the function name in the api.php file to reference the section in the 
user controller file, you can use api resource to group api resources with just the name of the controller
e.g. Route::apiResource('/user' 'userController'); 

3. Manually create a users table in the database.
4. Create a user model in app > user.php and create migration and seeder files which will populate the database table. (read more here https://laravel.com/docs/4.2/migrations)

create the migration file. The migration will be placed in your app/database/migrations folder

```
php artisan migrate:make create_users_table
```
and seeder files 

```
php artisan db:seed
```

5. Create a app > http > controllers > userController.php file which will run from the route.

This file contains the api CRUD functions e.g.

```
public function index(): UserResourceCollection
    {
        return new UserResourceCollection(User::orderBy('created_at', 'desc')->paginate(5));
    }
```
    
Make the API RESTFUL (which means adding GET, POST, PUT (to update) and DELETE request functions for users to easily access data)

6. Create data using resources in the app > http > resources > userResource.php file. 

Set up the json result as data using Laravel's resource facility. 

```
<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource

```

Wrap Json result in a parent. The parent of the json feed is called data and is easier to work with. 

```
{
    public function toArray($request)
    {
        return parent::toArray($request); 
    }
}
```

The user resource file takes information from the database and transforms it into an array.

7.  Add the resource into the app > http > controllers > UserController.php file 

```public function show(User $user): UserResource
    {
        return new UserResource ($user);
    }
```

make sure you reference the resource file at the top of the controller file.

```
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
```


Create functions for the various endpoints (i.e. index, post, put etc.) in the user controller file. store, update and delete endpoints

8. Versioning - N.b. versioning - if you make changes to any keys the user controller, routes and resource collection would all need to be updated. You would need to update the api and users who are using the api will see that it breaks. Therefore it is a good idea to use versioning for apis so that you can maintain old and new versions. Move these file to a folder called version, create a route prefix (e.g. /v1) so that users can easily see in the url which version they are using.  This url is written in the api.php file  


Files
======
Api
----
App > providers > RouteServiceProvider.php This file specifies the routes for APIs in the map API routes section, contains code 
for login and also specifies the prefix for API urls 

Routes > api.php - defines the api url

App > user.php this is the user model

App > http > controllers > user controller.php this file contains the functions for showing users data using parameters and returning a 
resource. Create a public function which will create a user and store the record.

App > http > resources > userResource.php - specifies the data format as a json array

App > http > resources >userResourceCollection.php. In addition to generating resources that transform individual models, you may generate resources that are responsible for transforming collections of models. This allows your response to include links and other meta information that is relevant to an entire collection of a given resource.

Use this file for the index route which returns all records and enter the paginate in the return statement to paginate the json results.  urls will be provided in the results relating to each page of data.


N.b. You can amend the return code in the user resource file to return specific fields instad of the whole array.  Comment out the line relating to array and add

return [
'first_name' => $this->first_name,
'last_name' -> $this->last_name ]

Doing this will then only return the first and last name information from the array.

Database
---------
database > factories > UserFactory.php this file enters fake data into the database

database > migrations > create_users_table.php

database > seeds > UserTableSeeder.php

database > seeds > databaseSeeder.php


