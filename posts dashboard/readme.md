
DASHBOARD PROJECT
====================


planing the posts dashboard 
-------------------------------------
create signup and sign in page which redirects to dashboard with the name 

home

protect the dashboard route from unauthenticated users
(unuathenticated users are redirected to the homepage)

Create a dashboard view. N.b. To access logged in detais of a user (e.g. 

email) in the header you can enter 
{{ Auth::user()->email }} in the header.blade.php file. N.b. using HTML5 

data attribute in the post you can later access posts by id

Create a post - send inputted post  content from the dashboard view to the 

database with the id of the logged in user

Read posts - outputting posts content to the dashboard page


update posts - edit posts (post author only) - modal to pull up data from 

a put and allow user to input changes (add the bootstrap javascript and 

jquery links to the master template file. Also create a public > src > js 

file with the code to display modal on click of the edit link). Jquery is 

used in the javascript file to fetch post content by going up a level on 

click and finding the text content and put it into the post body which is 

selected by its id

 N.b. the master layout file contains the script linking to the app.js 

file.

and save changes using ajax request in the javascript file when the save 

changes button is clicked n.b. you must also pass the crf token otherwise 

you will get an error (uses the session token from the script for the 

modal form). A new route for this request is also created in the script 

and also in the routes file. The controller is used to put the content int he database.

Delete posts (post author only)

like and dislike posts (except author posts)


set up 
-------
The following files have been used

post model
likes model

signup and signin view - welcome.blade.php
dashboard view

post controller loads the dashboard view, uses auth to log out user and 

redirect to home

routes

public > src > css > app.css

public > src > js file for the edit post modal






TO DO
=======
protected dashboard view - give message to user that they need to login
remove error colour formatting applied twice by mistake
format the date  and time on displayed posts
update the database on save
