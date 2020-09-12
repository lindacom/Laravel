<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Purchase;
use App\Category;
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



    // used by product page add to cart button

    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
   $cart = new Cart($oldCart); //create a new cart passing in the old cart
$cart->add($product, $product->id); // add product to the new cart

$request->session()->put('cart', $cart); //get the request and add cart to the session

return redirect()->route('product.index'); 
}


// used by the cart page buttons - reduce, add, remove all

public function getReduceByOne($id) {
   $oldCart = Session::has('cart') ? Session::get('cart') : null;
$cart = new Cart($oldCart); //create a new cart passing in the old cart
$cart->reduceByOne($id); // action in the cart model file

if (count($cart->items) > 0) {
    Session::put('cart', $cart);
 } else {
     Session::forget('cart');
 }
return redirect()->route('product.shoppingCart');
}

// used by the cart page buttons

public function getIncreaseByOne($id) {
   $oldCart = Session::has('cart') ? Session::get('cart') : null;
$cart = new Cart($oldCart); //create a new cart passing in the old cart
$cart->increaseByOne($id); // action in the cart model file

if (count($cart->items) > 0) {
    Session::put('cart', $cart);
 } else {
     Session::forget('cart');
 }
return redirect()->route('product.shoppingCart');
}


// used by the cart page buttons to remove an item from the cart

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


// used by the shopping cart url

public function getCart() {
  
    if (!Session::has('cart')) {
return view('shop.shopping-cart');
}

$oldCart = Session::get('cart'); //get cart items from the session
$cart = new Cart($oldCart); //create a new cart and pass in the old cart
return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
}


// used by cart page checkout button

public function getCheckout() {
    if (!Session::has('cart')) {
        return view('shop.shopping-cart');
}
$oldCart = Session::get('cart'); //get cart items from the session
$cart = new Cart($oldCart); //create a new cart and pass in the old cart
$total = $cart->totalPrice;
return view('shop.checkout', ['total' => $total]);
}

// used by the checkout form submit

public function postCheckout(Request $request) {
    if (!Session::has('cart')) {
        return redirect()->route('shop.shoppingCart');
    }
    $oldCart = Session::get('cart'); //get cart items from the session
    $cart = new Cart($oldCart); //create a new cart and pass in the old cart

// create new purchase and store in the database - uses purchase model and user model relationship
    $purchase = new Purchase();

    $purchase->cart = serialize($cart); //converts object to string to store in db
  
  //uses name attribute from checkout form
    $purchase->address = $request->input('address'); 
    $purchase->name = $request->input('name'); 
  //  $purchase->payment_id = $charge->id;

    Auth::user()->purchases()->save($purchase);

    Session::forget('cart');
    return redirect()->route('product.index')->with('success', 'Successfully purchased products');
}   


 public function getCategories()
    {
        $categories = Category::all();
       // return view ('shop.categories')->with(compact('categories'));

        return view('shop.categories', ['categories' => $categories]);
    
      
    }

public function getProductscat(Request $request, $id)
{
  // $category= Category::find($id);
 
  //  return view('shop.prodcat')->with(compact('category'));

 $products = Product::where('category', $id)->get();

   $category= Category::with($products)->find($id);


  return view('shop.prodcat', ['category' => $category])->with('product', $products);
}

} 
