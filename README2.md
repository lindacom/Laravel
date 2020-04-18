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
