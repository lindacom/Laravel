<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;

class ProductController extends Controller
{
    public function getIndex() {
        $products = Product::all();
    return view('shop.index', ['products' => $products]);
    }

    //product page add to cart button
    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
   $cart = new Cart($oldCart); //create a new cart passing in the old cart
$cart->add($product, $product->id); // add product to the new cart

$request->session()->put('cart', $cart); //get the request and add cart to the session

return redirect()->route('product.index'); 
}

public function getReduceByOne($id) {
   $oldCart = Session::has('cart') ? Session::get('cart') : null;
$cart = new Cart($oldCart); //create a new cart passing in the old cart
$cart->reduceByOne($id);

if (count($cart->items) > 0) {
    Session::put('cart', $cart);
 } else {
     Session::forget('cart');
 }
return redirect()->route('product.shoppingCart');
}

public function getRemoveItem($id) {
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
 $cart = new Cart($oldCart); //create a new cart passing in the old cart
 
 $cart->removeItem($id); //uses the removeItem function in the cart model
 
 if (count($cart->items) > 0) {
    Session::put('cart', $cart);
 } else {
     Session::forget('cart');
 }
 
 return redirect()->route('product.shoppingCart');
} 


public function getCart() {
  
    if (!Session::has('cart')) {
return view('shop.shopping-cart');
}

$oldCart = Session::get('cart'); //get cart items from the session
$cart = new Cart($oldCart); //create a new cart and pass in the old cart
return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
}

public function getCheckout() {
    if (!Session::has('cart')) {
        return view('shop.shopping-cart');
}
$oldCart = Session::get('cart'); //get cart items from the session
$cart = new Cart($oldCart); //create a new cart and pass in the old cart
$total = $cart->totalPrice;
return view('shop.checkout', ['total' => $total]);
}

public function postCheckout(Request $request) {
    if (!Session::has('cart')) {
        return redirect()->route('shop.shoppingCart');
    }
    $oldCart = Session::get('cart'); //get cart items from the session
    $cart = new Cart($oldCart); //create a new cart and pass in the old cart

// create new order and store in the database
    $order = new Order();
  //  $order->cart = serialize($cart); //converts object to string to store in db
  
    $order->address = $request->input('address'); //uses name attribute from checkout form
    $order->name = $request->input('name'); //uses name attribute from checkout form
    $order->payment_id = $charge->id;

    Auth::user()->orders()->save($order);

    Session::forget('cart');
    return redirect()->route('product.index')->with('success', 'Successfully purchased products');
}   
} 