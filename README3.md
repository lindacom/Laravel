How to
=======

Command line
=============

Create a new database table from the commandline
------------------------------------------------

To create a table called favorites:

```
php artisan make:migration create_favorites_table 

```
you can then go to the file in the database > migrations folder to add further column names.

then run php artisan migrate to update the table

Create a model from the commandline
-----------------------------------

```
php artisan make:model favorites
```

For else statement
===================

Used to display content if condition is true or display alternative content if results are empty. E.g

```
<ul style="list-style: none;">

@forelse(auth()->user()->follows as $user)
<li> <a href="{{ $user->path() }}"><img src="{{ asset('avatar.png') }}"  
    style=" padding-right:5px;margin-bottom:10px;" width="50px" alt="" 
         class="rounded-circle">{{ $user->name }} </a></li>
 @empty
 <li>No friends yet </li>
  @endforelse

</ul> 
```

Route model binding
====================

By default laravel looks for the primary key when returning results e.g. example.com/profiles/1 returns user with an id of one.

In the controller file you can find the user in the model 

```
$user = Post::findOrFail($id);
```

or alternatively you could pass the parameter which will return the same results as above.

```
 public function show(User $user)
    {
    
```

There may be times where you don't want to return the primary key but use some other column in the database (e.g. name). You can do this by entering something like this in the model file:

```
public function getRouteKeyName() {
         return 'name';
     }
```

In the controller file edit the store method

```
  public function show(User $user)
    {
 // $user = User::findOrFail($user);
   
//  return view('profile', $user);
return view('profile', compact('user'));
      }
    
    
```
you can then have a url like example.com/users/mary instead of example.com/users/1


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


Blade view file
===============

Linking to a view
------------------

```
<a href="{{ url("/posts") }}">

```
Include a file contents in a page
----------------------------------
Create a file _sidebar-links.blade.php
Include the file:

```
@include('_sidebar-links')

```

Flexbox layout
----------------

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
 
 Grouping records
 ----------------
 In the controller file obtain the collection using the group by method helper to group by date
 
 ```
   public function show(User $user) {
        $activities = $user->activity()->latest()->with('subject')->take->(50)->get()->groupBy(
            function ($activity) {
                return $activity->created_at->format('Y-m-d');
            });
        
        return view('profiles.showthread', [
            'profilethreadUser' => $user, //the method in the user model
            'activities' => $activities // sends $activities variable to the view
        ]);
    }
}
 ```
 
 In the view file loop through the activities variable and display the date as a heading. Within the loop create another loop to display the activities.
 
 ```
     @foreach ($activities as $date => $activity)
                    <h3 class="page-header">{{ $date }}</h3>

                    @foreach ($activity as $record)
                        @include ("profiles.activities.{$record->type}", ['activity' => $record])
                    @endforeach
                @endforeach
                
  ```
 
Previous and next record buttons
---------------------------------
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
 
Pagination
-------------

In the controller file retrieve collection with pagination (specify the number of records to return per page in the brackets) e.g.

```
 public function show(User $user) {
        return view('profiles.showthread', [
            'profilethreadUser' => $user,
            'threads' => $user->threads()->paginate(1)
        ]);
    }
```

In the view file loop through the collection e.g.

```
@foreach ($threads as $thread)
<iv class="panel panel-default">
<div class="panel-heading">

<a href="#">{{ $thread->creator->name }}</a> posted:
{{ $thread->title }}
</div>

<div class="panel-body">
{{ $thread->body }}
</div>
</div>
@endforeach</div>
```

Then in the view file add the pagination links:

```
{{ $threads->links() }}
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
