Mail
=====

Mail templates are located in vendor > laravel > framework > src > illuminate > mail > resources > views > html

In the .env file specify a mail driver 
In storage > logs directory you can view the log file (if the driver is set to log)

There are various types of mail that can be configured.

N.b. the return email address is either defined in the config > mail file or the .env file.

A flash message is data that is ut in a session for one request. You can display a flash message when email has been sent as follows:

In the controller file enter
->with('message', 'this is the message')

In the view file enter

{{ session('message') }}

Raw email
----------
Use the mail fascade in the controller file.  Construt the message, subject etc.

e.g.

mail::raw('it works', function($message) {
  $message->to(request('email'))
    ->subject('hello');
    
    });

HTML email
-----------
Create a model
Create a view file
Create a controller and use the html email as follows which uses the contact me class.

mail::to(request('email'))
->send(use contactMe());
    
Markdown template
------------------
To use the markdown template

in the model file write return $this->markdown('email contact')

In the view file add a mail message comonent

@component
('mail::message') 
your message text
@endcomponent
    
N.b. don't indent text in the compnent as it will not display well.    

Notification
===============

In the controllr file use the notification fascade.e.g send a notification to a signed in user:

notification::send(request()->user())

The controller ile list the notification channels.  There are various available including email, text, slack, post.  All channels use the same notification api
You can use more than one channel.

Database notification
-----------------------

Database notification is used to store notification in the database and display to the user.

1. Create a table to store notifications (id, type, notifiable, data, read_at, created_at, updated_at). N.b. the type is class App.  Notifiable_type and notifiable_id shows details
of who you are notifying e.g. user
2. Create a view file for notifications
3. Create a contrller file

public function via(notifiable) {
return('mail', 'database');
}

Return an array to be stored in the database

public function toArray($notifiable) {
return [];
}

SMS notification
----------------

Laravel uses nexmo.com for SMS notification.
    
