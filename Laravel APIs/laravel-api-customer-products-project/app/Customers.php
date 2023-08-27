<?php

namespace App;

use App\Review;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
	public $timestamps = true;

	protected $table = 'CUSTOMER';

	protected $fillable = [
	'booktitle', 'description', 'updated_at', 'created_at',
	];

	public function review()
    {
    	return $this->hasMany(Review::class); 
    }
   
}