

Functionality
=============
Index:
view all products
add products to the cart

Cart:
view the cart
perform cart actions - reduce by one, increase by one, reduce all
checkout

Checkout:
sign in/sign up to order products
Submit checkout form

User profile:
View profile and orders

Logout

Output product data
-----------------------
In the view file loop through the productsand display in chunks of three per row

```
@foreach($products->chunk(3) as $productChunk)
    <div class="row">
    @foreach($productChunk as $product)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>{{ $product->title }}</h3>
                    <p class="description">{{ $product->description }}</p>

                      <div class="clearfix">
                      <div class="pull-left"><p><strong>Category:{{ $product->category }}</strong></p></div>
                      </div>

                    <div class="clearfix">
                        <div class="pull-left price"><p><strong>Price:${{ $product->price }}</strong></p></div>
                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
 </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
```

User sign in and sign up
-------------------------

display form input errors:

```
@if(count($errors) > 0)
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
</div>
@endif
```

In the user controller file validate user details, create user and save to database, log user in the application as authenticated:

```
 public function postSignup(Request $request) {
        // validate user details
        $this->validate($request, [
             'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);
//create new user using input details
        $user = new User([
             'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        // save user details to the users table - uses the user model
        $user->save();

        Auth::login($user);
```

Middleware authenitcation
-----------------------------

display logged in confirmation in the navbar:

```
 @if (Auth::user())
<li>You are logged in as: {{ Auth::user()->name }}</li>
            @endif
```

Sessions
----------

Check if an item is in the session:

```
  if (!Session::has('cart')) {
        return redirect()->route('shop.shoppingCart');
    }
```

get items from session

```
$oldCart = Session::has('cart') ? Session::get('cart') : null;
```

put items into the session
```
  Session::put('cart', $cart);
  ```

Clear the session
```
 Session::forget('cart');
 ```
Shopping cart
-------------

in cart model check if items exist
```
  public function __construct($oldCart) {
        if ($oldCart) { //if a cart already exists get the cart details
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;

        }
    }
```
In cart model add items to cart

```
     public function add($item, $id) {
         
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' =>$item];
                if ($this->items) { 
           if (array_key_exists($id, $this->items)) {
               $storedItem = $this->items[$id];
           }
        }

        $storedItem['qty']++; 
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
     }
```
In cart model reduce items in cart by one. If items are below zero remove from cart

```
     public function reduceByOne($id) {
         $this->items[$id]['qty']--;
         $this->items[$id]['price']-= $this->items[$id]['item']['price'];
         $this->totalQty--;
         $this->totalPrice -= $this->items[$id]['item']['price'];
    
         // if the number of items in cart is less than or equal to o
         //remove item from cart
    if ($this->items[$id]['qty'] <=0) {
        unset($this->items[$id]);
    }
        }
```

In cart model increase items in cart by one
```
public function increaseByOne($id) {
         $this->items[$id]['qty']++;
         $this->items[$id]['price']+= $this->items[$id]['item']['price'];
         $this->totalQty++;
         $this->totalPrice += $this->items[$id]['item']['price'];
    
         // if the number of items in cart is less than or equal to o
         //remove item from cart
    if ($this->items[$id]['qty'] <=0) {
        unset($this->items[$id]);
    }
        }
 ```
 In cart model remove all items from cart
 ```

        public function removeItem($id) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['price'];
            unset($this->items[$id]);
        }
  ```

Create an order, serialize and store in database table
----------------------------------
In the product controller:

```
public function postCheckout(Request $request) {
    if (!Session::has('cart')) {
        return redirect()->route('shop.shoppingCart');
    }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart); 

    $purchase = new Purchase();

    $purchase->cart = serialize($cart);
  
 
    $purchase->address = $request->input('address'); 
    $purchase->name = $request->input('name'); 
 
    Auth::user()->purchases()->save($purchase);

    Session::forget('cart');
    return redirect()->route('product.index')->with('success', 'Successfully purchased products');
} 
    
 ```
 
 Retrieve orders unserialized from database table
 ------------------------------------
 
 ```
  @foreach($purchases as $purchase)
<h3>Order date: {{ date('d-m-Y', strtotime($purchase->created_at)) }} </h3> {{-- changed date to d-m-y --}}
<div class="panel panel-default">
<div class="panel-body">
 <ul class="list-group"> 
 
 {{-- item is set in the cart model. Item is an associative array.  Using brackets because we are accesing a field in the array --}}

@foreach($purchase->cart->items as $item) 

<li class="list-group-item">
<span class="badge">${{ $item['price'] }}</span>
{{$item['item']['title'] }} | {{ $item['qty'] }} Unit
</li>
@endforeach
</ul> 
</div>
<div class="panel-footer">
<strong>Total Price: ${{ $purchase->cart->totalPrice }}</strong>
</div>
</div> 
@endforeach
```
