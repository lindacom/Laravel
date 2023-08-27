@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">


<div class="col-md-8">
     
    

<div class="card">
 {{-- <div class="card-header text-white bg-dark mb-3">  <a href="#">{{ $thread->creator->name }}</a> posted: </div>--}}
  
  <div class="card-body">                      
                   <h2>     {{ $thread->title }} </h2>

      @if (Auth::check())                             
 <form action=" {{ $thread->path() }}" method="POST"> 
{{--<form action="/threads/{{$channel->slug}}/{{$thread->id}}" method="POST"> --}}
{{ csrf_field() }}
{{ method_field('DELETE') }}

<button type="submit" class="btn btn-link">Delete thread</button>
</form>
@endif

                        {{ $thread->body }}
                    </div> </div>
             
           
        

        <!-- REPLIES-->

       <!-- PAGINATION -->
       <div class="card">
  

            <!-- this include statement is not working as it requires the profile parameter to be brought in also 
            Missing required parameters for [Route: profile]-->

        <!--   {{ $thread->replies }}  -->


        <div class="card-body"> 
            @foreach ($replies as $reply)
                    @include ('threads.reply')
                @endforeach </div>
               

                <div class="card-footer text-white bg-light mb-3"> 
<?php $replies = $thread->replies()->paginate(2); ?>

  {{ $replies->links() }} 
  </div>
  
<!-- ADD A REPLY FORM -->
<!-- replies are being successfully inserted into the database -->
      
       @if (auth()->check()) 
         
                    <form method="POST" action="{{ $thread->path() . '/replies' }}"> 
   {{--  <form method="POST" action="/threads/{{$channel->slug}}/{{$thread->id}}/replies"> --}}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Post</button>
                   
                    </form>
                
            
        @else 
            <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
       @endif 
       </div> </div>
      
       <div class="col-md-4">
       <div class="card">
  <div class="card-header text-white bg-dark mb-3">  <p>Summary</p> 
  </div>

  <div class="card-body">                      
                  <p>This thread was published {{ $thread->created_at->diffForHumans() }}
            {{--      by <a href="#">{{ $thread->creator->name }}</a> --}}
                 
                
                 and currently has 

                 {{ $thread->replies()->count() }} comments. </p>

                
                  <!-- string plural changes text depending on count  error class str not found -->
             {{--   <p>  {{ $thread->replies()->count() }} {{ str_plural('comment', $thread->replies()->count() ) }} comments. </p> --}}
                                   
                     
                  
               
       
      
     

       </div> </div> 
@endsection