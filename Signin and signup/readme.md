Checklist when creating a user sign up form
---------------------------------------------

1. Create a user table in the database - database migration file
2. Create a user model - app > user.php file
3. Create a sign up page (view) - resources > views > user folder. The filename should end in .blade.php
4. Create a route to the sign up page
5. Create a controller which the route will access to return the  view
6. Protect all routes that need to be logged in before the user can view (pages that are for authenticated users e.g. shopping cart) using the auth middleware
7. Capture and produce error messages for the user to improve user experience

Authenticating users
=====================

config > auth.php contains the configuration for user authentication and points to the App\User model (nb. make sure this is spelt the same with a capital U in the file structure otherwise the system will not be able to find this model)

app > http > middleware > authenticate.php - this file is the authentication middleware accessed in the middle of a request

Validating user input
======================
(using this->validate in the user controller file).

- user already used
- invalid input
- field not empty
- limit number of characters   To put a red border around fields with errors use the if 

Create a function to see if errors has email for example then use the has-errors bootstrap style

Working with sessions
========================

config > session.php - in this file you can set the length of the session
storage > framework > sessions folder

Nb. using request old in the value property of a form field keeps the inputted data when the form is rejected so the user doesn't have to fill 
it in again.
