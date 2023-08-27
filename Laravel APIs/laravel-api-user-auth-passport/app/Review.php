<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	public $timestamps = true;

	protected $fillable = [
	'booktitle', 'description', 'updated_at', 'created_at',
	];
   
}