Creating a REST API in Laravel for the users table
===================================================
In the terminal in the desktop directory install Laravel
```
composer global require "laravel/installer=~1.1" "
```
Update composer

```composer update
```

Create a new project
---------------------
Create a new project
```
laravel new api-project
```
A folder will be created on the desktop. Go to the directory of the project
```
cd api-project
```

Create a database 
------------------

```
mysql -uroot -p
CREATE DATABASE `api-project`;
```
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

create data
-----------

3. Manually create a users table in the database.


create the migration file. The migration will be placed in your app/database/migrations folder

```
php artisan migrate:make create_users_table
```
and seeder files to create sample data

```
php artisan db:seed
```

run factory app\articles\class\30 create

geerate a factory

php artisan make factory articlefactory where you can format data

4. Create a user model in app > user.php and create migration and seeder files which will populate the database table. (read more here https://laravel.com/docs/4.2/migrations)

To create a model with migration:
```
php artisan make:model Student -m
```
A new file will be created in the App foler.You will have to edit the file to specify the database table we will like to interact with and the fields that can be written to (protected table and protected fillable)

modify the .env file to input database credentials.

Additionally, a migration file will be created in the database/migrations directory to generate the table. You will have to modify the migration file to create columns which will accept string values.
```
php artisan migrate creates the tables
php php artisan db:seed makes seed data
```

Open the database to see the rcords have been created

Create controller
--------------
```
php artisan make:: controller ArticleController --resource
```

You will find a new file named ApiController.php in the app\http\controllers directory. You will need to create all the methods in thi file - index, create, show etc.

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

```
php artisan make:resource UserResource
```

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

Create routes
--------------
In the routes directory and open the api.php file and create the endpoints that will reference the methods created earlier in the ApiController.

N.b. All routes in api.php are prefixed with /api by default


php artisan make::resource article http > resources >article.php

8. Versioning - N.b. versioning - if you make changes to any keys the user controller, routes and resource collection would all need to be updated. You would need to update the api and users who are using the api will see that it breaks. Therefore it is a good idea to use versioning for apis so that you can maintain old and new versions. Move these file to a folder called version, create a route prefix (e.g. /v1) so that users can easily see in the url which version they are using.  This url is written in the api.php file  

Create relationships between models
====================================
Create relationshps the model files.

Has many

```
public function review()
    {
    	return $this->hasMany(Review::class); 
    }
```

Belongs to

```
public function product()
    {
    	return $this->belongsTo(Product::class); 
	}
```
To check relationships open Tinker

```
php artisan tinker
```
In the command line you can find products by id

```
App\Model\Product::find(2)
```

You can find all reviews related to the product id

```
App\Model\Product::find(2)->reviews
```

Test in browser
--------------------

Run the following command and open localhost in the browser
```
php artisan serve
```

Test in Postman
---------------
Enter the localhost url in postman and select the action (GET POST etc)

Laravel token authentication
============================
In Larael you can authenticate in various ways - using built in token authentication, using JWT or using Laravel Passport.
To implement token authentication

1. Create authorisation - the following command creates a users table and a password reset table

```
php artisan make auth
```
Note that the .env file contains the following fields

PUSHER_APP_ID
PUSHER_APP_KEY
PUSHER_APP_SECRET

2. Create middleware called Authkey. The following command creates a file in app > http > middleware > AuthKey.php

```
php artisan make: middleware AuthKey
```
In he AuthKey file enter the following in the handle function:

$token = $request -> header ('APP_KEY');
if ($token!='abcd') {
return response ()->json(['message'=>'App key not found'], 401);
}

3. Register middleware - in app > http > kernelphp in the api route register the middleware

```
\App\Http\Middleware\Authkey::class,
```

4. Test the authentication run php artisan serve.  In postman send a get request with key APP_KEY and value abcd and send.


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

App > http > resources > userResource.php - specifies the data format as a json array. A resource class represents a single model that needs to be transformed into a JSON structure. Once the resource is defined, it may be returned from a route or controller. In essence, resources are simple. They only need to transform a given model into an array.

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


