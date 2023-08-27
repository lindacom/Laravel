@extends('layouts.app')

@section('content')

<div class="container">
<div class="page-header">
<h1>
{{ strtoupper($profilethreadUser->name) }}

<!-- error created at is returning no results check the table -->
<br />
 <small>Member since {{ $profilethreadUser->created_at->diffForHumans() }}</small> 
<hr />
</h1>
</div>
<h2>Activity</h2>
@foreach ($activities as $date => $activity)
                    <h3 class="page-header">{{ $date }}</h3>

                    @foreach ($activity as $record)
                      @if (view()->exists("profiles.activities.{$record->type}"))
                        @include ("profiles.activities.{$record->type}", ['activity' => $record]) <!-- includes the file in profiles > activities folder that is suffixed with the record type corresponding to the activity record -->
                    @endif
                    @endforeach
                @endforeach


<!-- this foreach code has been amended above and extracted and placed in an activities include file -->
{{-- @foreach ($threads as $thread)
<iv class="panel panel-default">
<div class="panel-heading">

<a href="{{route('profile', $thread->creator) }}">{{$thread->creator->name}}</a> posted:
<a href="/profilesthread/{{ $thread->creator->name }}">{{ $thread->creator->name }}</a> posted:
<a href="{{ $thread->path() }}">{{ $thread->title }}</a>
</div>

<div class="panel-body">
{{ $thread->body }}
</div>
</div>
@endforeach --}}

</div>

{{-- {{ $threads->links() }} --}}

@endsection