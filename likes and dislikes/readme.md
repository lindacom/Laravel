Likes and dislikes using Ajax
================================

Tutorial: https://www.youtube.com/watch?v=y5qZJ7sYN88&list=PL55RiY5tL51oloSGk5XdO2MGjPqc0BxGV&index=19

View page has like and dislike hyperlinks which are both active.
Like - a new row is created in the likes table - 1 like, user id and post id. Clicking link again will undo the action and delete the row.
Dislike - if user has already liked then the entry is updated 0 dislike (using the $update variable)

Tables
------
Likes - id, user_id, post_id, like, created_at, updated_at
Users
Posts

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

View
-----

The like and dislike links checks whether authenticated user has liked the post and display either like link or text that user has already performed an action using Ajax.

```
   <div class="interaction">
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
                    </div>
                    
                     <script>
    // stored variables (contained in the routes file) to be used in ajax request
              var urlLike = '{{ route('like') }}';
    </script>
 ```
 
 Ajax - public > src > js> app.js
 -------------------------------------
 
 The ajax request sends data to the controller.
 The controller updates the database table
ajax interacts with the dom to make changes to the view page. 

in the app.js file add a new jquery statement to listen for all elements with a like css class and act on click

```
$('.like').on('click', function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null; //checking whether first link like or second link dislike was clicked and return true or false
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    })
        .done(function() { // find text related to like and dislike 
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) { // if is like toggle like dislike link text accordingly
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
 ```

Routes 
--------
```
Route::post('/like', [
    'uses' => 'PostController@postLikePost',
    'as' => 'like'
]);
```

Controller
----------

Controller adds row to the likes table user_id, post_id, like, created_at, updated_at

find id of the post
get authenticated user
check like status

```
  public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first(); //check all likes belonging to user to see if post id matches
        if ($like) {
            $already_like = $like->like; //if the like variable matches the like in the database column then update
            $update = true;
            if ($already_like == $is_like) {
                $like->delete(); // Clicking like link again will undo the action and delete the row.
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
  ```




TO DO
--------
Like table update - has user already liked it then change like to dislike or vice versa. user like in the table has been set to one update the entry to change one to zero (dislike)
display the number of likes a post has (take total from the likes table $something = $user->likes() )
