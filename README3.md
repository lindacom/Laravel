Retrieving records from the database
====================================
By default the following function would use the id of the record in the database to retrieve details eg. example.com/profiles/1

```
 public function show(User $user)
    {
   
          return $user;

    } 
    
```

You can override this in the model file as follows:

```
public function getRouteKeyName() {
         return 'name';
     }
```

You can now retrieve the details e.g using the name column of the table e.g. example.com/profiles/mary



Linking to a view
=================

```
<a href="{{ url("/posts") }}">

```
Include a file contents in a page
=======================
Create a file _sidebar-links.blade.php

```
@include('_sidebar-links')

```

Flexbox layout
================

To display three columns of equal spacing on a page

```
<div class="container">
               
          <div class="d-flex justify-content-between">
          <div class="flex-1">1</div>
          <div class="flex-1">2</div>
          <div class="flex-1">3</div>
          </div>

          </div>
          
 ```
 
Previous and next buttons
===========================
In the controller file show method add:

```
 public function show($id)
    {
        $post = Post::findOrFail($id);

if(! $post) {
    abort(404);
}

    // get previous post id
    $previous = Post::where('id', '<', $post->id)->max('id');

    // get next post id
    $next = Post::where('id', '>', $post->id)->min('id');

    return view('posts.show', [
        'post' => $post
    ])->with('previous', $previous)->with('next', $next);
        /*  return view('posts.show', [
              'post' => $post
          ]);*/
    }
 ```
On the view page add previous and next links

```
<a href="{{ URL::to( 'posts/' . $previous ) }}">Previous</a>
<a href="{{ URL::to( 'posts/' . $next ) }}">Next</a>
```
 
 
 
Authentication
===============

Navigation
-----------

Show homepage for logged in user

```
 @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            ```
