Trait
======

When you find that there are three or more related methods in a model they can be extracted into a trait.

A trait is is file located in the same directory as the model.  A trait is a handy way of reusing code in php.

1. In the model file cut out the required methods and add the name of the trait to the use statement
2. Create the trait file in the App directory 
3. Paste all of the methods into the file.

e.g trait called followable
```
<?php

namespace App;

trait Followable


{


public function follow(User $user) {
    return $this->follows()->save($user);
}
```
e.g. user model referencing the followable trait
```
<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
 
    use Notifiable, Followable;
    
    ```
