<div>
  @foreach($tweets as $tweet)
  
  <a href="{{ route('profile', $tweet->user) }}">
  <img src="{{ asset('avatar.png') }}"  style=" padding-right:5px; margin-bottom:10px;" width="50px" alt="" class="rounded-circle">
  {{ $tweet->user->name }}
  </a>
  <p class="text-wrap border-bottom">{{ $tweet->body }} </p> 
  @endforeach
  </div>