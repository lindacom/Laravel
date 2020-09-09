<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;

class ProductController extends Controller
{
public function getCategories()
    {
        $categories = Category::all();
       // return view ('shop.categories')->with(compact('categories'));

        return view('shop.categories', ['categories' => $categories]);
    
      
    }
