@extends ('layout')
          
              @section('content')
             
              <div class="container">
              <h2>  Laravel Posts </h2>
              <div class="row">        
             
               <div class="col-sm-8">
                  <div>    
                {{-- <p>  {{ $post->id }} </p> --}}
                  <h3> {{ $post->slug }}</h3>             
                  </div>

              <p><img src="http://lindacom.infinityfreeapp.com/images/monkey.jpg" alt="" class="image image-full" /></p>

<!-- <p><a href="/{{ $post->id }}"> {{ $post->slug }}</a> </p> this is going to the main site not laravel -->
                 <p>  {{ $post->body }} </p>

<!-- previous and next buttons link to the query in the show method of the controller -->
<a href="{{ URL::to( 'posts/' . $previous ) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Previous post</a>
<a href="{{ URL::to( 'posts/' . $next ) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Next post</a>


     
                 </div>

                 <div class="col-sm-4 bg-secondary p-3">
                    <div>
                 <p>About</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc malesuada vel est nec eleifend. Nunc nec ornare odio. Sed sapien massa, eleifend eu placerat non,</p>
                </div>
                
                 <div>
                 <p>About</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc malesuada vel est nec eleifend. Nunc nec ornare odio. Sed sapien massa, eleifend eu placerat non,</p>
                 </div>

                 <div>
                 <p>About</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc malesuada vel est nec eleifend. Nunc nec ornare odio. Sed sapien massa, eleifend eu placerat non,</p>
                 </div>
                
                 </div>


                  </div>   </div>   

               @endsection
                
           
            
        
   
