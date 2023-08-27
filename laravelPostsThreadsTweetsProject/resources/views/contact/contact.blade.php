@extends ('layout')
          
              @section('content')
             
              <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="card">
                <div class="card-header"><h1>  Contact us</h1></div>
                <div class="card-body">                

                  <form method="post" action="{{ url('/contact') }}">
                 @csrf
                              
                    
  <div class="form-group">  
  <label for="excerpt">name</label><br>
    <textarea class="form-control" name="name" id="name"></textarea>
  </div>  

  <div class="form-group">  
  <label for="excerpt">email</label><br>
    <textarea class="form-control" name="email" id="email"></textarea>
  </div> 

  <div class="form-group">  
  <label for="excerpt">question</label><br>
    <textarea class="form-control" name="question" id="question"></textarea>
  </div> 

    <div class="form-group">  
  <label for="body">verification</label><br>
    <textarea class="form-control" name="verification" id="verification"></textarea>

  </div>  

 
 <button class="btn btn-primary btn-lg" type="Submit">Submit</button>

  
  
</form> 


</div>  </div></div>
</div>  </div></div>
               

               @endsection
                
           
            
        
   
