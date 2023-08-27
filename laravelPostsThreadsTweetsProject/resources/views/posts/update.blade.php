@extends ('layout')
          
              @section('content')
                
  <div id="wrapper">
              <div id="page" class="container">
                  <h1>  Update a post </h1>

                  <form method="post" action="{{ url('/posts/$post->id') }}">
                  @csrf
                  @method ('PUT')
                  
                  <div class="field">
  
  <label class="label" for="title">Title</label><br>

  <div class="control">
  <input class="input" type="text" name="title" id="title" value="{{ $post->title }}">

  </div>  </div>

  <div class="field">  
  <label class="label" for="excerpt">Excerpt</label><br>
  <div class="control">
  <textarea class="textarea" name="excerpt" id="excerpt" value="{{ $post->slug }}"></textarea>
  </div>  </div>

    <div class="field">
  
  <label class="label" for="body">Body</label><br>

  <div class="control">
    <textarea class="textarea" name="body" id="body" value="{{ $post->body }}"></textarea>

  </div>  </div>

 <div class="field is-grouped">
 <div class="control">
  <button class="button is-linked" type="Submit">Submit</button>
  </div>  </div>
  
</form> 


</div>  </div>
               

               @endsection
                
           
            
        
   
