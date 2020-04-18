Download Laravel project from live to local environment
========================================================

On the live server download the whole laravel folder.

PHP
----
Download PHP tools for Visual studio.
Download PHP for Windows https://www.php.net/downloads.php

System settings
-------------------
In Windows in the control panel go to Advanced System Settings In the System Properties window click the Environment Variables button. 
Select System Variables -> PATH and click new. Enter the folder where your PHP.exe is located.

Composer
--------
Download composer https://getcomposer.org/doc/00-intro.md#locally

Visual studio code
------------------
Open visual studio code and open the project folder.
Go to file > preferences > settings expand the extensions folder and select php. Click the link to edit the settings.json file.
and add "php.validate.executablePath": "c:/php/php.exe" 
Go to view > extensions and add the composer extension pack and the mysql extension pack.
Open the commandline and enter php artisan serve.  Copy the server link and run the site in the browser.
Enter CTRL + C to stop.

N.b. if you get an openssl error you may need to enter the exact path in the php.ini file. Chane extension =openssl to
extension = c:/php/ext/php_openssl.dll

Create a new project
====================
Once installed, the simple laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog would create a directory named blog containing a fresh Laravel installation with all dependencies installed.

Configuration
-------------
The first thing you should do after installing Laravel is set your application key to a random string.The key can be set in the .env environment file.If the application key is not set, your user sessions and other encrypted data will not be secure!

the config/app.php file contains several options such as timezone and locale

In a fresh Laravel installation, the root directory of your application will contain a .env.example file. If you install Laravel via Composer, this file will automatically be renamed to .env. Otherwise, you should rename the file manually.All of the variables listed in this file will be loaded into the $_ENV PHP super-global when your application receives a request. 

Database
--------
You need to enter database connection details in two files:

The database configuration file is config/database.php. Currently Laravel supports four database systems: MySQL, Postgres, SQLite, and SQL Server. enter database connection information.(sqlsrv or mysl)

In the .env file enter database connection information.(sqlsrv or mysl)
