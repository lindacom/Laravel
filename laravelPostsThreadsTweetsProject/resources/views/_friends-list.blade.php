

<h3 class="margin-bottom">Following</h3>


<ul style="list-style: none;">

@forelse(auth()->user()->follows as $user)
{{--<li> <a href="{{ route('profile', $tweet->user) }}"><img src="{{ asset('avatar.png') }}"  style=" padding-right:5px;margin-bottom:10px;" width="50px" alt="" class="rounded-circle">{{ $user->name }} </a></li> --}}

<li> <a href="{{ $user->path() }}"><img src="{{ asset('avatar.png') }}"  style=" padding-right:5px;margin-bottom:10px;" width="50px" alt="" class="rounded-circle">{{ $user->name }} </a></li>
 @empty
 <li>No friends yet </li>
  @endforelse

</ul> 


