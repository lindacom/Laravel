<?php

namespace App;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $table = 'tags';
    protected $fillable = ['name'];

     // a tag belongs to many posts
    public function posts() {
        return $this->belongsToMany(Post::class);
             } 

             public function getRouteKeyName() {
               return 'name';
             }
            
}