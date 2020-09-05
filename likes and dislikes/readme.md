Likes and dislikes using Ajax
================================

Tutorial: https://www.youtube.com/watch?v=y5qZJ7sYN88&list=PL55RiY5tL51oloSGk5XdO2MGjPqc0BxGV&index=19

Tables
------
Likes - id, user_id, post_id, like, created_at, updated_at

Model
------
Create like model and database migration file - php artisan make:model Like -m

A like belongs to a post and belongs to a user:

```
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
```

A post belongs to a user and can have multiple likes:

```
class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
```

plan
------


is it a like or dislike - 1 like 0 dislike
id of the user who liked or disliked
id of the post

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
