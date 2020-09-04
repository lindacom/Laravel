Authentication
==============
The middleware authentication uses the app > http > middleware > authenticate.php file. You are able to call this using auth because 'auth' is listed as the key in the
app > http > kernel.php file.

Add authentication
------------------
To add authentication to a page write the following in a controller file:

```
public function __construct() {
$this->middleware('auth');
}
```

A user will then need to be signed in to view the page retured in the view.

N.b you could alternatively add middleware to the routes in the web.php file

```
e.g. (HomeController)->middleware('auth')
```

```
e.g. 
Route::get('/dashboard', [
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);
```

Get authenticated user's name
-------------------------------

To get the name of an authenticated user and dislay it in a page write the following in the view file

<p>You are logged in {{ Auth::user()->name }} </p>

Create a post and attach to a user
-----------------------------------------
Create the relationship in the post model file i.e. a post belongs to a user

```
 public function user()
    {
        return $this->belongsTo('App\User');
    }
 ```
 In the controller file pass request to the action method and save the post to the user
 
```
$request->user()->posts()->save($post)
```

Check if authenticated user is the owner of the post
-----------------------------------------------------
In the controller action method:
```
  if (Auth::user() != $post->user) {
            return redirect()->back();
        }
```

In the view page you can show certain content based on the same check:

```
   @if(Auth::user() == $post->user) enter content here @endif
```

Get url of page accessed before login page
-------------------------------------------

In the app > http > middleware > authenticate.php file get the old url enter:
```
use Session;
```
and in the handle function enter:
```
Session::put('oldUrl', $request->url());
```
In the controller file use the old url enter

```
if (Session::has'oldUrl')) {
return redirect()->to(Session::get('oldUrl');
```

If/else signed in
------------------
To display user name when signed in or page title when not signed in write the following in the view file

```
@if(Auth::check())
Hi, {{ Auth::user()->name }}
    @else
     Laravel
@endif
```

N.b. instead of using the if statement you could use @auth and @endauth

N.b. as an alternative to checking an authenticated user you can use @guest and @endguest to display a message for a guest user.

Password reset
---------------

1. .env file has environment settings for mail. N.b. you can use log driver to log email instead of sending it.
2. the environment variables from the .env file are referenced in the config >mail.php file. Various drivers are available bt the default is SMTP using mailtrap.io to 
test emails.
3. app > http > controllers > auth > ForgotPasswordController.php. the route /password/reset points to this controllers showLinkRequestForm method.
The route /password/eail points to this controller's SendResetinkEmail method.

Steps in Laravel's built in password reset

A. User clicks the forgotten pasword link and enters email address. The user credentials are checked and a check on whether a request has previously been issued.
B. A recrd is created in the password resets table (email, token, created at)
C. An email is sent to the user.  References user model which etends authenticable and uses notifiable. 
If you have set the driver to log then go to storage > logs to view the log file related to the password reset email.  The log file
will contain a link to reset password.  Nb you will notic in the database the token is hashed therefore in the log file the token will be different from the token in the 
database.
D. User pastes the reset link in the rowser which takes them back to the website.  The website confirms the token with that in the database and provides a form to 
set up a new password
E. The user receives confirmation tha the password is reset and the user table is updated with the new password details.

Authorisation
==============

Authorised user
----------------
Model has a policy
Policy class contains a method that refers to a model

Authorisation filters
----------------------

App > provider > authserviceprovider

Middleware based authorisation
-----------------------------------

In th routes file apply middleware with identifier, ability name and wildcard as follows:

->middleware('can::view, conversation')

N.b. you can alternatively add the middleware to the controller file.

Log out
========

In the controller file use the auth fascade 

```
use Illuminate\Support\Facades\Auth;
```

and then reference it in the action method

```
 public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
```

