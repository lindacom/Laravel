<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $table = 'books';
    protected $fillable = ['imagePath', 'title', 'description', 'price'];

     //  one product has many categories - select products by category id
             public function categories() {
             //  return $this->hasMany(Category::class, 'id');
             return $this->belongsToMany(Category::class);
                    } 



}
