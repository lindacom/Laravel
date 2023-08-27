<ul style="list-style: none;">
<li><a class="font-bold text-lg black" href="{{ url('/news') }}">Home</a></li>
<li><a class="font-bold text-lg black" href="{{ url('/home') }}">Explore</a></li>
<li><a class="font-bold text-lg black" href="{{ url('/home') }}">Notifications</a></li>
<li><a class="font-bold text-lg black" href="{{ url('/home') }}">Messages</a></li>
<li><a class="font-bold text-lg black" href="{{ url('/home') }}">Bookmarks</a></li>
<li><a class="font-bold text-lg black" href="{{ url('/home') }}">Lists</a></li>
<li><a class="font-bold text-lg black" href="{{ route('profile', auth()->user()) }}">Profile</a></li>
</ul>