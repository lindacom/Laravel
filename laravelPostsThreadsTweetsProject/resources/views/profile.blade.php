@extends ('layout')
          
              @section('content')

              <div class="container" >
                 <h2>My profile</h2>               
          <div class="d-flex align-items-start p-2  display-flex" >
<!-- flex fill fills the whole width of the column -->


           <div class="flex-1 p-3 mb-2 flex-fill border" style="margin-right:20px;height:30rem">@include('_sidebar-links')</div>
          
           <div class="flex-1 p-3 mb-2 flex-fill border" style="margin-right:20px;height:30rem">
           <h3>Name: {{ $user->name }}</h3> 
           <h3>Email: {{ $user->email }}</h3> 
           <h3>Joined: {{ $user->created_at }}</h3> 

<div>
<img src="{{ $user->avatar }}" 
alt="" class="" style="left:50%" width="150">
</div>

<div class="flex">
          <a href="/profiles/{{ $user->username }}/edit"> <button class="btn btn-primary float-right" type="Submit">edit profile</button></a>
  @if (auth()->user()->isNot($user))        
           <form method="POST" action="/profiles/{{ $user->name }}/follow">
           @csrf 
           <button class="btn btn-primary float-right" type="Submit">
          <!-- toggles follow and unfollow button -->
           {{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow me' }}
           </button>
            </form>
            @endif 
            </div>

          @include('_timeline', [
          'tweets' => $user->tweets
          ])
          </div>
          <div class="flex-1 p-3 mb-2 flex-fill border" style="margin-right:20px;height:30rem"></div>
       
          {{-- <div class="flex-1 p-3 mb-2 flex-fill border" style="margin-right:20px;height:30rem">@include('_friends-list')</div> --}}
         @endsection
                
           
            
        
   
