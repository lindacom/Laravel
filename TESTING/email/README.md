Testing emails 
===============

Mail driver
-----------
In the .env file you will see the default mail driver is SMTP. You can change this to log driver which will then log emails to a file.

Laravel's transport manager class builds up each driver.  The file is located in 
vendor > laravel > framework > src > illuminate > mail > transportManager.php

The log driver uses log transport.  The file is located in 
vendor > laravel > framework > src > illumnate > mail > Transport > LogTransport.php

Steps:

In the test file in the setup function create a listener
In the function create an event to be triggered
