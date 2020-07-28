// CREATE A POST FORM IN BOOTSTRAP CARD DESIGN CENTRED IN THE PAGE

@extends ('layout')
          
              @section('content')

              <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="card">
                <div class="card-header"><h1>  New post </h1></div>
                <div class="card-body">
                  

 <form method "post" action="{{ url("/posts") }}"> 
                  @csrf
                  
                  <div class="field">
  
 <!-- <label class="label" for="title">Title</label><br>
  <div class="control">
   <input class="input type="text" name="title" id="title" value="{{ old('title') }}">
 {{-- <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" id="title">--}}
  {{--  @error('title')
  <p class="help is-danger"> {{ $errors->first->('title') }} </p>
@enderror --}}
  </div>  </div> -->

  <div class="form-group row">  
  <label class="col-md-4 col-form-label text-md-right" for="excerpt">Excerpt</label><br>
  <div class="col-md-6">
  <textarea class="textarea form-control" name="excerpt" id="excerpt"></textarea>
  </div>  </div>

    <div class="form-group row">
  
  <label class="col-md-4 col-form-label text-md-right" for="body">Body</label><br>

  <div class="col-md-6">
    <textarea class="textarea form-control" name="body" id="body"></textarea>

  </div>  </div>

  <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
  <button class="btn btn-primary" type="Submit">Submit</button>
  </div>  </div>
  
</form> 

</div>  </div></div>
</div>  </div></div>

 
               

               @endsection
                
           
            
        
   
