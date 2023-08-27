<?php

namespace App;
use App\Review;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $table = 'PRODUCTS';
	protected $fillable = [
		'bookTitle', 'updated_at', 'created_at',
		];
	protected $hidden = array(
        'image',
	);
	
    public function review()
    {
    	return $this->hasMany(Review::class); 
	}
	
	
}