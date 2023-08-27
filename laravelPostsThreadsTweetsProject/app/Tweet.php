<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'tweets';
    protected $fillable = ['body'];

       // used on the show method - one article has many tags
       public function user() {
        return $this->belongsTo(User::class);
             } 
}