# Laravel instructions

Setting up the database
========================

Configure the config > database.php file
Configure the .env file

CSS file
=========
The editable css file is located in public > src > css > app.css
import it into your template file using a link

routes
=====

web middleware must be used to group all routes that are involved in 

sessions

add ->name('home'); at the end of the route function to name the route home for example

Middleware
===========
Middleware is accessed in the middle of a request

web - checks if csrf token is set

authenticate.php file - checks authentication

All middleware is managed in the kernel.php file and individual middleware 

php files are stored in the middleware folder

Databases
==========

models have connections to databases.

Forms
=====

Use a hidden button field to store session details so that you dont get errors
