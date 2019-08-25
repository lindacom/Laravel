user account

============

project plan

create form with input field of image
upload a file settings for standard format for files
validate data in the form
Link to the account in the header using the account route



setup

account view
route to display the image file
route to display the view

using laravel storage engine to store files in the storage folder. using the storage facade in the user controller file. config > file systems.php has config for file storage (cloud, server storage) set disk you want to use (e.g. local). In the view file you use the route in order to display the file (you cannot access the file directly from the storage folder). if file exists return file as a response, the response is then handled by the controller

user controller to get account view passing the currently logged in user to the view using the user method in the auth facade


nb. file upload won't work if you dont have enctype"multipart/form-data" 

in the form

to do
======

only accept certain file types. 
display small icon of user's image next to the signed in as title in the header

More on storage in Laravel: https://laravel.com/docs/5.2/filesystem

