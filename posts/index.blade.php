@extends ('layout')
          
              @section('content')
             
              <ul class="nav justify-content-end bg-dark">
  <li class="nav-item">
    <a class="nav-link active" href="{{ url('/posts/create') }}">Create a post</a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/login') }}">Login</a>
  </li>
  @if (Route::has('login'))
                                   @auth
                                   <li class="nav-item">
    <a class="nav-link" href="#">Dashboard</a>
  </li>
  
  @else
    <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Dashboard</a>
  </li>
 
  @endauth
  @endif
</ul>

                  

                  <div class="container">
                  <h1>  Posts </h1>
                  
                    <div class="row">
                   
                        <div class="col-md-4">                        
  <div class="list-group">
  <a href="{{ url('/posts/create') }}" class="list-group-item list-group-item-action active">
    Create a post
  </a>
  <a href="#" class="list-group-item list-group-item-action">Read a post</a>
  <a href="#" class="list-group-item list-group-item-action">Update a post</a>
  <a href="#" class="list-group-item list-group-item-action">Delete a post</a>
  <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Dashboard</a>
</div>
  </div> 
                                 
  <div class="col-md-8"> 
  <div class="row"> 
                                 @foreach($posts as $post)
                            
    <div class="col-md-4">
              <div class="card-deck"> 
             
   <div class="card" style="height:35rem">
    
    <img src="http://lindacom.infinityfreeapp.com/images/monkey.jpg" style="width:100%" class="card-img-top" alt="...">
    <div class="card-body">
      <a href="{{ url('/posts/'.$post->id) }}"><h5 class="card-title">{{$post->slug }}</h5></a>
      <p class="card-text"> {{$post->body }}</p>
      <span class="badge badge-pill badge-secondary">Secondary</span>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated {{$post->created_at}}</small>
    </div>
  
  </div>
  </div>
  </div>
  

  
@endforeach
</div> 


  



</div>
  


  </div>
  </div>

  <div class="position-static">
  <nav aria-label="...">
  <ul class="pagination pagination-lg justify-content-center">
    <li class="page-item active" aria-current="page">
      <span class="page-link">
        1
        <span class="sr-only">(current)</span>
      </span>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
  </ul>
</nav>
</div>
               @endsection
                
           
            
        
   
