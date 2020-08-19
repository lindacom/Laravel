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

Test email is sent
--------------------

Steps:
1. In the .env file change the mail driver to log. This will be used for email sending.
2. Create a view file for the form which will trigger an email send.
3. In the routes.php file create a post route to the controller file
4. Create a controller. Use illuminate\support\fascades\mail
5. Create a mailable class. (in the commandline enter php artisan maemail <filename> )
5. In the test file write a function to check mai is sent. Use mail::fake(); within the function to send mail.  At the top of the file use mail fascade.
  
Test email is queued
---------------------

Email queuing puts emails on a queue before they reach the ai server. 

A queue consists of

1. A job (file located in the app > jobs folder where queued jobs are stored )
2. A logic for the task (e.g. email sending) you want to run. Use the mail fascade and use the handle method in the job file.
3. A worker that runs the job (e.g. controller to send email notification)

Queue configuration (e.g. connection configuration) is located in config > queue.php file. The file contains queue backends e.g. Amazon SQS Redis etc.

N.b you can also create a mail queue database table to hold jobs.

Steps:

1. Build an email
2. Set up configuration for sending the email.  This involves:

A. Configure SMTP server settings in the .env file
B. Create a mailable class  (App > Mail > <filename> ) and modify the build function with values like sender, subject etc.
C. Create the email body in the view file
