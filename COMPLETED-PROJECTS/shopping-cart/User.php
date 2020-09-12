<?php

namespace App;

use App\Purchase;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
 
 public function purchases(){
    return $this->hasMany(Purchase::class);
}

    // N.b. one to one relationships have a foreign key set up in the table

   public function profile() {
        return $this->hasOne(Profile::class);
             } 


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function getRouteKeyName() {
         //instead or querying /id in url you can query /name
         return 'name';
     }
  
  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

// get the image of the user for the user profie page

    /* public function getvatarAttribute($value) {
        return asset ($value);
            } */

    public function path($append = '') {
        $path = route('profile', $this->username);

        return $append ? "($path)($append)" : $path;
    }
}
