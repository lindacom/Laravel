@extends('layouts.app')

@section ('content')
       
<div class="container" >
<h2>News</h2>
               
          <div class="d-flex align-items-start p-2  display-flex" >
<!-- flex fill fills the whole width of the column -->
           <div class="flex-1 p-3 mb-2 flex-fill border" style="margin-right:20px;height:30rem">@include('_sidebar-links')</div>

          <div class="flex-1 p-3 mb-2 flex-fill border" style="margin-right:20px;height:30rem">
  
          <div class="container" style="padding:20px">

  <div class="clearfix">
  <form action="" method="post">  
  @csrf
  <textarea class="textarea form-control" name="body" id="body" cols="38" rows="10" placeholder="whats up doc?"></textarea>
  <hr />
  <footer>
   <button class="btn btn-primary float-right" type="Submit">Submit</button>
   </footer>  
  </form>
  @error('body')
  <p class="text-danger">{{ $message }}</p>
  @enderror
  </div>
 

  <div>
  @forelse($tweets as $tweet)
  
  <a href="{{ route('profile', $tweet->user) }}">
  <img src="{{ asset('avatar.png') }}"  style=" padding-right:5px; margin-bottom:10px;" width="50px" alt="" class="rounded-circle">
  {{ $tweet->user->name }}
  </a>
  <p class="text-wrap border-bottom">{{ $tweet->body }} </p> 
 @empty<p>No tweets yet</p>
  @endforelse
  </div>
  
  </div>
  
  </div>


          <div class="flex-1 p-3 mb-2 bg-secondary flex-fill" style="margin-right:20px;height:30rem">@include('_friends-list')</div>
         
          </div>
          </div> 
        

         
 
@endsection