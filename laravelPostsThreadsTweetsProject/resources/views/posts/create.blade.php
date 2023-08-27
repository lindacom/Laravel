@extends ('layout')
          
              @section('content')

              <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="card">
                <div class="card-header"><h1>  New post </h1></div>
                <div class="card-body">
                  

 <form method="POST" action="{{ url('/posts') }}"> 
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
  <label class="col-md-4 col-form-label text-md-right" for="slug">Slug</label><br>
  <div class="col-md-6">
  <textarea class="form-control {{ $errors->has('slug') ? 'is-danger' : ''}}" name="slug" id="slug" value="{{ old('slug') }}" required></textarea>
  @if ($errors->has('body'))
    <p class="help is-danger"> {{ $errors->first('slug') }} </p>
    @endif
  </div>  </div>

    <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="body">Body</label><br>
  <div class="col-md-6">
    <textarea class="form-control {{ $errors->has('body') ? 'is-danger' : ''}} " name="body" id="body" value="{{ old('body') }}" required></textarea>
    @if ($errors->has('body'))
    <p class="help is-danger"> {{ $errors->first('body') }} </p>
    @endif
  </div>  </div>

  <label class="label" for"tag">Tags</label>
  <div class="control">
  <select name="tags[]" multiple>
  @foreach ($tags as $tag)
  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
  @endforeach
  </select>

  <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
  <button class="btn btn-primary" type="Submit">Create a post</button>
  </div>  </div>
  
</form> 

</div>  </div></div>
</div>  </div></div>

 
               

               @endsection
                
           
            
        
   
