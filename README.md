# Laravel instructions

When using Laravel on a hosted site all files and folders are stored in the Laravel folder in the main site structure (htdocs).

<ul>
<li>config > app.php - this file contains configuration such as url</li>
<li>package.json - this file lists dependencies</li>
<li>resources > assets > sass > _variables.scss - contains variables</li>
<li>app > http > kernel.php - this file lists the middleware</li>
<li>app > http > middleware - this folder contains the files that are linked to in the kernel file. You add the middleware (e.g. auth - only authenticated users can access) to the route in the routes file</li>
  </ul>


The controller access the model which then uses the database. models have connections to databases.

Pages and layouts
==================
In Laravel pages are called views, they are stored in the resources > views folder, the files contain html code and the filename ends with .blade.php.

In the resources > views folder you can create sub folders (e.g. layouts, includes) and create new files containing HTML for the layouts. The filenames should end in .blade.php.

In the view file you enter something similar to the following to include the content in your page

@include(includes.sidebar')
@section('sidebar') @endsection
@yield('content')

To extend a layout @extends(layouts.app')

It is possible to add conditionals to includes so that they only pull in certain scenarios (e.g. only show a sidebar on the landing page) To do this you would enter something like the following 

@if(Request::is('/'))
@include('includes.sidebar')
@endif

Images
==================
To display an image stored in the public directory enter

{{ asset('image.jpg') }}

Forms
=====

CSS file
=========
The main file location is resources > assets > sass. To add to the CSS you do this in resources > assets > sass > app.scss file. 
N.b. you can create several scss files in this area and import them into the app.scss file usine @import "filename"). The files should be prefixed with an underscore but you don't need to include the underscore in the import statement

The editable css file is located in public > src > css > app.css
import it into your template file using a <link rel="stylesheet" href="/css/app.css">

Javascript file
===============

In the webpack.mix.js file you can add to the javascript.  This file points to the main javascript file located in public > js > app.js which contains the full minified js code.

Setting up the database
========================

<ul>
  <li>Configure the config > database.php file</li>
  <li>Configure the .env file</li>
  </ul>

database > migrations - two php files are already set up in the folder during setup (create users table and create password resets table). You can create more files in this folder which will hold the schema for the database table.

database > seeds - the databaseSeeder.php file is already created at setup. you can create more files in this folder which will add content to the table.

Controllers
============

app > http > controllers

The main file is the controller.php file. You can create various controller files which will be used in the routes file.

routes
=====

routes > web.php

The return statement in a route loads a view. As you build your site you add various routes to return the various pages (views) of the site.

A route request can be either get or post.

web middleware must be used to group all routes that are involved in sessions

To provide a name for a route for easy reference elsewhere in the site add ->name('home'); at the end of the route function to name the route home for example

Nb. it is possible to group similar routes

Middleware
===========
Middleware is accessed in the middle of a request. You can either add middleware in a callback closure (eg. in the web.php file) or in the controller file.

All middleware is managed in the app > http > kernel.php file - checks if csrf token is set, sessions, cookies etc.

individual middleware php files are stored in the App > http > middlewarefolder

authenticate.php file - checks authentication. The handle method returns an unauthorised response or redirects userto the login page
redirectauthenticaed.php - then handle method redirects authenticated user to a specific page

N.b. you can also create additional middleware files - php artisan make:middleware.

N.b Use a hidden button field to store session details so that you dont get errors

USEFUL TUTORIALS
==================
Shopping cart - https://www.youtube.com/playlist?list=PL55RiY5tL51qUXDyBqx0mKVOhLNFwwxvH <br />
Social network - https://www.youtube.com/watch?v=_dd4-HEPejU&list=PL55RiY5tL51oloSGk5XdO2MGjPqc0BxGV
Laracasts - https://laracasts.com/series/intermediate-laravel
