Laravel session
=================

Laravel installation comes with a config > session.php file where you can set the default session driver (e.g. file)
When the default driver is set to file, this will save the session in storage > framework > sessions directory

(see documentation)

use session
-----------
At the top of the controller file enter 

use Session;

Add item to the session
-----------------------

In the routes file enter:

```
Route::get('/add-to-cart/{id}',  [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
    
]);
```

In the controller file enter:

```
 public function getAddToCart(Request $request, $id) {
$request->session()->put('cart', $cart); 
```

In the view file enter:

```
<a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
```

Check if item (called cart) is in session 
--------------------------
1.Create a model file called cart

2,In the controller file check if the session contains a cart by entering:

   $oldCart = Session::has('cart') ? Session::get('cart') : null;
   
   Display items in the session
   ------------------------------
   
   Number of items in the cart
   
   ```
                   <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a></li>
                ```
