<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'bookcategory';
    protected $fillable = ['category'];

     // a category belongs to many books
    public function products() {
        return $this->belongsToMany(Product::class);
             } 
            
}
