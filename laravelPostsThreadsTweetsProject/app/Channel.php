<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function getRouteKeyName() {
        return 'slug';
    }

 //   protected $table = 'channels';
 //   protected $fillable = ['name', 'slug'];

    public function threads() {
        return $this->hasMany(Thread::class);
    }
}
