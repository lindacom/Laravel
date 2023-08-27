@extends ('layout')
          
              @section('content')
             
              <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="card">
                <div class="card-header"><h1>  Edit profile </h1></div>
                <div class="card-body">                

                  <form method="post" action="{{ $user->path() }}" enctype="multipart/form-data">
                 @csrf
                  @method ('PATCH')
                 
                    
  <div class="form-group">  
  <label for="name">Name</label><br>
  <input class="form-control" name="name" id="name" value="  {{ $user->name }}"required>
  @error('name')
  <p>{{ $message }}</p>
  @enderror

  </div>  

  <div class="form-group">  
  <label for="username">Username</label><br>
  <input class="form-control" name="username" id="username" value=" {{ $user->username }}" required>
  @error('username')
  <p>{{ $message }}</p>
  @enderror
 
  </div> 

  <div class="form-group">  
  <label for="avatar">Avatar</label><br>
  <input type="file" name="avatar" id="avatr">
  @error('avatar')
  <p>{{ $message }}</p>
  @enderror
   </div> 

   <img src="{{ $user -> avatar }}" alt="your avatar" width="40px">

  <div class="form-group">  
  <label for="email">Email</label><br>
  <input type="email" class="form-control" name="email" id="email" value=" {{ $user->email }}"required>
  @error('email')
  <p>{{ $message }}</p>
  @enderror
 
  </div> 

  <div class="form-group">  
  <label for="password">Password</label><br>
  <input type="password" class="form-control" name="password" id="password" required>
  @error('password')
  <p>{{ $message }}</p>
  @enderror
   </div> 

  <div class="form-group">  
  <label for="password_confirmation">Password confirmation</label><br>
  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
  @error('password_confirmation')
  <p>{{ $message }}</p>
  @enderror
 
  </div> 

   

 
 <button class="btn btn-primary btn-lg" type="Submit">Update profile</button>

  
  
</form> 


</div>  </div></div>
</div>  </div></div>
               

               @endsection
                
           
            
        
   
