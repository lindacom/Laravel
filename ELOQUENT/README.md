Eloquent relationships
=======================

There are may eloquent relationships - belongsTo, hasMany, hasOne, belongsToMany.

examples:

post belongs to a user
user has many posts

post has many tags
tag belongs to many posts

Database tables
----------------

To create a relationship between articles and users:

1. Create a users table (parent table)
2. Create an posts table (child table). 

N.b. if a user is delete the relationship still exists with the apost.

Foreign key
===============
The posts table needs a user_id column and this will be the foreign key.

A foreign key constraint is used to link two tables together. Field(s) in the child table refers to the primary key of the parent table.  A foreign key constraing prevents 
actions from destroying the link and also prevents invalid data.

Create a foreign key as follows:

In Sql server:

```
CREATE TABLE posts (
user_id int FOREIGN KEY REFERENCES users(user_id)
);
```
In mysql:
```

FOREIGN KEY(user_i) REFERENCES users(user_id)
```
Models
========

Post model:

```
 public function user() {
        return $this->belongsTo(User::class);
             } 

             public function tags() {
                return $this->belongsToMany(Tag::class);
                     } 
```
N.b. if you want to refer to the user as an author instead you can set this as the second argument to override the foreign key e.g.

```
public function author() {
return $this->belongsTo(User::class, 'user_id')
}

```
User model:

```
 public function posts() {
                return $this->hasMany(Post::class);
                     } 
                     
```
In the PostController file you will then be able to access the user as a property of post 

```
Posted by {{ $post->user->first_name }}
```

Controllers
============

Make posts collection available in a view page
----------------------------------------------

1. At the top of the file use the model e.g. App > Post
2. Create an action that will fetch the post and send it to the view file


```
  public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }
```
3. In the view file loop over the post collection
```
   @foreach($posts as $post)
```

N.b. the name in the controller 'posts' must be equal to the one in the foreach statement $posts.

4. You can then access the database fields as a property of the post object. e.g {{ $post->body }}

Get posts by id
---------------
1. From the view page pass the post ID as a variable to the route for the action method 

```
   <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
```

2. In the controller file in the action method search the post collection where id equals the post ID variable.

```
  public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
```
N.b. the name in the array must equal the parameter expected by the action method i.e. $post_id
N.b. alternatively you could use  $post = Post::find($post_id)->first();

Sort a collection
------------------

```
 $posts = Post::orderBy('created_at', 'desc')->get();
```

