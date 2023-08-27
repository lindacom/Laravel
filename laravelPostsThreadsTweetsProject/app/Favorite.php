<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    public function favorited() {
        return $this->morphTo();
    }

    public function favorites() {
        return  $this->morphMany(Favorite::class, 'favorited');
      }
   
      public function favorite() {
   
       $attributes = ['user_id' => auth()->id()];
   
       if (! $this->favorites()->where($attributes)->exists())
   {
     return  $this->favorites()->create($attributes);
    
   }
     //   return $this->morphMany(Favorite::class, 'favorited');
      }
   
      public function isFavorited() {
          return $this->favorites()->where('user_id', auth()->id())->exists();
      } 

     public function unfavorite() {
         $attributes = ['user_id' => auth()->id() ];

         $this->favorites()->where($attributes)->delete();
     }






}
