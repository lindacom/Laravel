@extends('layouts.appthread')

@section('content')

<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd; margin-bottom:20px;">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/threads">All threads</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Channels
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach (App\Channel::all() as $channel)
          <a class="dropdown-item" href="/threads/{{ $channel->slug }}">{{$channel->name}}</a>
          @endforeach
        </div>
      </li>
      <li class="nav-item">
      @if (auth()->check())
      <a class="nav-link" href="/threads?by={{ auth()->user()->name }}">My threads</a>
      @endif
      </li>
      <li class="nav-item">
      <a class="nav-link" href="/threads/create">New Thread</a></li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!-- end of nav -->



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

<div class="card">
  <div class="card-header text-white bg-dark mb-3"><h2>    Forum threads</h2>
  </div>

  <div class="card-body">
   @forelse($threads as $thread)
   <div class="container">
    <div class="row">
        <div class="col-md-2">
  <img src="http://lindacom.infinityfreeapp.com/images/thought.jpg" width="70px"></div>
  <div class="col-md-10">
    <h5 class="card-title">  <a href="/threads/{{$channel->slug}}/{{$thread->id}}">{{ $thread->title }}</a></h5>
   
   <div style="display:flex; align:center;"><strong> {{ $thread->replies->count() }} replies </strong></div>
    <p class="card-text">{{ $thread->body }}</p><hr />
     </div> @empty
  <p>You have not created any threads yet.</p>
    </div> </div>
   
        @endforelse
      
      </div>
</div>

</div></div></div>




      
  

     

@endsection


