<?php

namespace App;

Use App\Post;
Use App\Thread;
use App\Reply;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // all methods related to followin a usr have been moved from this file to the followable model
     use Notifiable, Followable;

    protected $fillable = [
        'name', 'username', 'avatar','email', 'password',
    ];

    // N.b. one to one relationships have a foreign key set up in the table

   public function profile() {
        return $this->hasOne(Profile::class);
             } 

             // user has many posts - foreign key has been set up in the posts table
             public function posts() {
                return $this->hasMany(Post::class);
                     } 

                             public function timeline() {
                                 // get latest tweets from tweets table written by the logged in user
                               //  return Tweet::where('user_id', $this->id)->latest()->get();

                               // get tweet of this user and users that this user follows
                              $friends = $this->follows()->pluck('id');
                              
                               return Tweet::whereIn('user_id', $friends)
                               ->orWhere('user_id', $this->id)
                               ->latest()->get();
                             }

                             public function tweets() {
                                return $this->hasMany(Tweet::class);
                                     } 

                                     // returns the latest threads e.g to the profilethreads view
                                     public function threads() {
                                        return $this->hasMany(Thread::class)->latest();
                                             }    
                                        
                 public function replies() {
                    return $this->hasMany(Reply::class);
                            }  

                            public function activity() {
                                return $this->hasMany(Activity::class);
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

    /* public function getvatarAttribute($value) {
        return asset ($value);
            } */

    public function path($append = '') {
        $path = route('profile', $this->username);

        return $append ? "($path)($append)" : $path;
    }
}
