@extends ('layout')
          
              @section('content')
             
              <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="card">
                <div class="card-header"><h1>  Edit a post </h1></div>
                <div class="card-body">                

                  <form method="post" action="{{ url('/posts/'.$post-> id) }}">
                 @csrf
                  @method ('PUT')
                 
                    
<!--<div class="field">

                  input is self closing tag that's why you can set value in textarea there is closing tag so put value between tags 
  
  <label class="label" for="title">Title</label><br>
  <div class="control">
  <input class="input" type="text" name="title" id="title" value=" {{ $post->id }}">

  </div>  </div>-->

  <div class="form-group">  
  <label for="excerpt">Slug</label><br>
  
  <textarea class="form-control" name="slug" id="slug">{{ $post->slug }}</textarea>
  </div>  

    <div class="form-group">  
  <label for="body">Body</label><br>
    <textarea class="form-control" name="body" id="body">{{ $post->body }}</textarea>

  </div>  

 
 <button class="btn btn-primary btn-lg" type="Submit">Update post</button>

  
  
</form> 


</div>  </div></div>
</div>  </div></div>
               

               @endsection
                
           
            
        
   
