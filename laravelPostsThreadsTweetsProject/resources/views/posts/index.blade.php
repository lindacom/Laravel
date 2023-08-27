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
<h3>Categories</h3>

@foreach (App\Tag::all() as $tag)
   <li><a href="/posts/{{ $tag->name }}">{{$tag->name}}</a></li>
   @endforeach

<h3>Search</h3>
<div class="form-group ">
            <input type="text" name="full_text_search" id="full_text_search" class="form-control" value="" placeholder="Search by slug e.g my-title" onfocus="this.value=''" >
        
       @csrf
       <button type="button" name="search" id="search" class="btn btn-success">Search</button>
    
       </div>

          <p id="mylist">You liked the following articles:</p>
</div>
  </div> 
                                 
  <div class="col-md-8"> 
  <div class="row"> 
<p id="searchresults"></p>
@forelse($posts as $post)
                            
    <div class="col-md-4">
              <div class="card-deck"> 
             
   <div class="card" style="height:35rem">
    
    <img src="http://lindacom.infinityfreeapp.com/images/monkey.jpg" style="width:100%" class="card-img-top" alt="...">
    <div class="card-body">
      <a href="{{ url('/posts/'.$post->id) }}"><h5 class="card-title">{{$post->slug }}</h5></a>
      <p class="card-text"> {{$post->body }}</p>


    @foreach($post->tag as $tag)
      <span class="badge badge-pill badge-secondary">
      <a href="/posts?tag={{$tag->name}}">{{ $tag->name }}</a>
           </span> 
      @endforeach 
     
      <i onclick="myFunction(this)" class="fa fa-thumbs-up" style="margin-right: 15px;" id="{{$post->slug }}"></i>
    

    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated {{$post->created_at}}</small>
    </div>
  
  </div>
  </div>
  </div>
  

  @empty
  <p>No relevant articles yet.</p>
  @endforelse

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


<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
         <tr>
            <th>id</th>
            <th>slug</th>
            <th>body</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th>user_id</th>
         </tr>
     </thead>
     <tbody></tbody>
    </table>
   </div>
               @endsection
                
           
            
        
               <script>

const items = []; //set empty array

function myFunction(x) { //pass in id number

   x.classList.toggle("fa-heart"); //change icon to heart
  
  
   const text = x.id; //get id of the clicked thumb and put in const text
   const item = { //put text in const item (you can have more const and add them to this item)
     text,
     done: false  };
 
    
   
 items.unshift(item); //push item to beginning of the array
  
       // items.push(item); // push item into the items array
  
var mysavedlist = localStorage.setItem('items', JSON.stringify(items)); //put items array in local storage   
  
  mylist = JSON.parse(localStorage.getItem('items'));  // get items from local storage (using parse to convert to format)

  $('#mylist').css('display', 'inline-block').append(items[0].text); // show the hidden div and display first item on the page

  
   }
</script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

 $('#search').click(function(){
 var full_text_search_query = $('#full_text_search').val();
 
   var _token = $("input[name=_token]").val();
  $.ajax({
   url:"{{ route('full-text-search.action') }}",
   method:"POST",
   data:{full_text_search_query:full_text_search_query, _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    if(data.length > 0)
    {
     for(var count = 0; count < data.length; count++)
     {
     
      output += '<p>'+data[count].slug+'</p>';
      output += '<p>'+data[count].body+'</p>';
       
     }
    }
    else
    {
    
     output += '<p>No Data Found</p>';
       }
       $('tbody').html(output);
   }
  });
 });
});



</script>
