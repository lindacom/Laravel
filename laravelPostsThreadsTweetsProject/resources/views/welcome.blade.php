@extends ('layout')

@section ('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else

                    <a href="{{ url('/posts') }}">Posts</a>
                    <a href="{{ url('/news') }}">News</a>
                    <a href="{{ url('/threads') }}">Discussion forum</a>
                    <a href="{{ url('/contact') }}">Contact us</a>
                        <a href="{{ route('login') }}">Login</a>

                        

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                        <button type="button" class="btn btn-primary">
  Notifications <span class="badge badge-light">4</span>
</button>
                    @endauth
                </div>
            @endif

            <div class="content">


            <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">@example.com</span>
  </div>
</div>

<!-- if user is signed in display their name otherwise display laravel -->
@if(Auth::check())
<div class="title m-b-md">
                    Hi, {{ Auth::user()->name }}
                </div>
                @else
                <div class="title m-b-md">
                    Laravel
                </div>
@endif



                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>

                           </div>

               
            </div>
        </div>
 
@endsection