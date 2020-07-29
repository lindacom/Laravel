Form input to database
=======================

1. Create a model
2. Create a route to controller
3. Create a store method in the controller file
4. Create a view file containing the form

Form
-----
Form should use post method and action the route that points to the controller store method. Include csrf to prevent cross site request forgery.

```
<form method "post" action="{{ url("/posts") }}"> 
@csrf
  <textarea class="textarea form-control" name="body" id="body" cols="38" rows="10" placeholder="whats up doc?"></textarea>
<button class="btn btn-primary float-right" type="Submit">Submit</button>

```

Display errors for mandatory fields

```
  @error('body')
  <p class="text-danger">{{ $message }}</p>
  @enderror
  
  ```
  
  Controller
  ---------
  
  ```
   public function store(Request $Request)
    {   

       $attributes = request()->validate([ 'body'=> 'required|max:255' ]);

        Tweet::create([
         'body' => $attributes['body']

        ]);
    
                   return redirect('/news');
    }
    
 ```
