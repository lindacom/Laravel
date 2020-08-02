Create a table
===============

1. Create a posts table in the database

Posts

id int, auto_increment,<br>
slug varchar,<br>
body varchar,<br>
created_at date,<br>
updated_at date<br>

Display the body of the post depending on endpoint
===================================================

url endpoint:
http://example.com/laravel/public/two


2. Create a route in the routes > web.php file that will call the controller show method
3. Create a post model
4. Create a controller that will query the database
5. Create a view that will display the posts
