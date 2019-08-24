Authenticating users
=====================

config > auth.php contains the configuration for user authentication

Checklist when creating a form
-------------------------------

1. validate input - user already used, invalid input, field not empty, 

limit number of characters (using this->validate in the user controller 

file). using request old in the value property of a form field keeps the 

inputted data when the form is rejected so the user doesn't have to fill 

it in again. To put a red border around fields with errors use the if 

function to see if errors has email for example then use the has-errors 

bootstrap style

2. protect routes that need to be logged in to view (for authenticated users)
3. produce error messages for the user
