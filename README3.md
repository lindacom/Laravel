Linking to a view
=================

```
<a href="{{ url("/posts") }}">

```

Flexbox
=========

To display three columns of equal spacing on a page

```
<div class="flex">
          <div class="flex-1">1</div>
          <div class="flex-1">1</div>
          <div class="flex-1">1</div>
          </div>
          
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
