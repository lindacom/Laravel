<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	public $timestamps = true;

	protected $table = 'REVIEWS';

	protected $fillable = [
	'booktitle', 'description', 'updated_at', 'created_at',
	];

/*	public function customer()
    {
    	return $this->hasMany(Customers::class); 
	}*/
	
	public function product()
    {
    	return $this->hasMany(Product::class); 
    }
   
}