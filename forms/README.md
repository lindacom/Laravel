Form
=====

Disable a button

<button :disabled='true'>
   
   Enable a button on keyup in the text field
   
   <form @keydown=''>

Form validation
================

When a form is submitted. Controller file:
```
   public function postSignUp(Request $request)
    {

        //validates the field in form request using the name property
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);

// assigns the request field input to a variable
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        //uses user model and column in the user table set to request variable above
        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        //saves the new user
        $user->save();

        //login the user
        Auth::login($user);

        return redirect()->route('dashboard');
    }
 ```
 
 Retain form input after errors displayed
 --------------------------------------------
 ```
             <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
 ```

Form input to database
========================

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
-------------------------------------

N.b. as error messages may be used on various pages you could place the code in an include file and then include it in the view pages   @include('includes.message-block')

```
  @error('body')
  <p class="text-danger">{{ $message }}</p>
  @enderror
  
  ```
  
  Select field with option values from the database
  
  ```
  <div class="form-group">  
  <label for="channel">Choose a channel</label>
  <select name="channel_id" id="channel_id" class="form-control">
@foreach (App\Channel::all() as $channel)
<option value="{{ $channel->id }}">{{ $channel->name}}</option>
  @endforeach
  </select></div>
  ```
  Using named routes
  -------------------
  
  In the web.php file create a named route e.g
  
  ```
  Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
  ```
  
  In the form action field you can now reference the named route plus the wildcard 
  
  ```
  <action="{{ route('articles.show', $article }}">
  ```
  
  Form validation
  ----------------
You can enter validation e.g required in the form field.  You can also enter validation in the controller.  In the form field you can mar errors to display red text and mark form fields to display as red when the form is sumitted with errors.
  
Inserting a value of old will ensure that when the form is submitted with errors, the entered text is returned to the field.

  ```
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="body">Body</label><br>
  <div class="col-md-6">
    <textarea class="form-control {{ $errors->has('body') ? 'is-danger' : ''}} " name="body" id="body" value="{{ old('body') }}" required></textarea>
    @if ($errors->has('body'))
    <p class="help is-danger"> {{ $errors->first('body') }} </p>
    @endif
  </div>  </div>
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
 
 Enhance forms with Vue
 =======================
 
 Bound input
 -----------
 1. In the vue instance set up data
 
 ```
 data: {
 coupon 'freebie'
 }
 ```
 
 2. Bind the input field <input :value='coupon'>
 
 3. Listen for the changed input and get the value
 
 ```
 <input type='text' :value='coupon' @input='coupon=$event.target.value'>
 ```
 N.b. you can alternatively create an input component
 
 Input component
 ----------------
 1. Above the vue instance crate a component called coupon
 
 ```
 vue.component('coupon', {
 props: ['code'],
 
 template: '
 <input type='text' value='code' @input 'updateCode($event.target.value)'>
 ',
 
 methods: {
 updateCode(code) {
 this.$emit('input', code);
 }
 }
 });
 
 2. In the view file enter a tag <coupon v-model ='coupon'> and bind it to the component so that it listens has items to input event
 
 
 Ajax - axios
 --------------
 1. At the bottom of the view file add script files to import axios cdn and vue cdn and import /js/app.js.
 2. In the appjs file create a view instance and specify data
 
 ```
 data: {
 name: '',
 description: '',
 },
 ```
 3. In the view file add v-model directive to input fields (<input v-model='description'>)
 and listen for wen the form is submitted (in the form tag enter @submit='onSubmit')
 
 4. In app.js file entr method for the submit event. Use axios to submit post request to an endpoint (which hits method in controller)
 
 ```
 methos: {
 onSubmit() {
 axios.post('/projects', {
 name: this.name,
 description: this.description
 });
 }
 }
 
 ```
 N.b. you could alternatively use this.data
 N.b you can modify default behaviour by adding . after dirctive e.g
 @submit.once - only submit once
 @submit.prevent - prevent default behaviour
 
