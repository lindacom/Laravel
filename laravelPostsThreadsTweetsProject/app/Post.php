<?php

namespace App;

use App\Tag;
use Auth;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{

  use Notifiable;
  use SearchableTrait;
  use Likeability;

  // useed by the search box
  protected $searchable = [
    'columns' => [
      //  'id'   => 10,
        'slug'   => 10,
        'body'   => 10,
      //  'created_at'   => 10,
      //  'updated_at'   => 10,
      //  'user_id'   => 10,
          ]
];
    protected $table = 'posts';
    protected $fillable = ['slug', 'body'];

     // a post belongs to a user - foreign key has been set up in the posts table
     public function user() {
        return $this->belongsTo(User::class);
             } 

           // used on the show method - one article has many tags - select posts by tag id
             public function tag() {
               return $this->hasMany(Tag::class, 'id');
                    } 

                 

}