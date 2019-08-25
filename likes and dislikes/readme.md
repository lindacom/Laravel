Likes and dislikes
===================

models and ajax

plan
------

create likes table to store
is it a like or dislike - 1 like 0 dislike
id of the user who liked or disliked
id of the post

create a like model (relationship - a like is done by one user attached to one post)

use the post model (relationship - a post can have multiple likes)

use the user model (relationship - user can have multiple likes)



activate the links in the dashboard page 

Create routes 

in the app.js file add a new jquery statement to listen for all elements with a like css class

using ajax calls to send request and interact with the dom to make changes





Like table update - has user already liked it then change like to dislike or vice versa. user like in the table has been set to one update the entry to change one to zero (dislike)


file structure
=============

Like model

migration file create likes table contains the schema for the table

TO DO
--------

display the number of likes a post has (take total from the likes table $something = $user->likes() )
