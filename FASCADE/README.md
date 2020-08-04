Fascades
==========
A fascade is a static interface to underlying components.  Using a fascade means there is no need to create factories and dependencies. 
Fascade is located at vendor > laravel > framework > src > illuminate > support > fascades and is pulled in through composer.

There are various fascades including:

View.php
Request.php
file.php - enables you to read, copy, move and get the extension of a file.

A fascade returns a key that references a binding in the service container.
