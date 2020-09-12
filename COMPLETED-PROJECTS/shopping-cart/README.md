Laravel shopping cart
=======================

Tutorial: Acemind - Laravel 5.2 PHP - Build a Shopping Cart
Shopping cart - https://www.youtube.com/playlist?list=PL55RiY5tL51qUXDyBqx0mKVOhLNFwwxvH

Set up the environment
------------------------
1. Download project repository
2. Change .env.example file to .env
3. Run the command php artisan key:generate to generate a key for your applicatio.

Set up the database tables
---------------------------
Users table:
id PrimaryIndex	int(11)  AUTO_INCREMENT	
username	varchar(100)
first_name	varchar(250)
name	varchar(100)
email	varchar(100)
password	varchar(250)
address	varchar(250)
postcode	varchar(250)
updated_at	date
created_at	date

books table:
id Primary	int(100) AUTO_INCREMENT
firstname	text
lastname	text
title	text	
price	decimal(30,2)
featured	varchar(25)
category	text
categoryId	int(11)
image	varchar(500)
imagePath	varchar(500)
precis	varchar(80)
description	text
summary	text	
product	text	
likes	int(11)	
dislikes	int(11)	
totallikes	int(11)

purchases table:
idPrimary	int(11)	AUTO_INCREMENT
user_id	int(11)
name	varchar(250)
cart	text	
address	varchar(250)
created_at	date
updated_at	date

N.b. the whole of the cart will be entred into the cart field of the table as a long string so the type is therefore set to text.
Configure database settings
----------------------------
1. In the .env file enter database connection credentials.
2. In the config > database.php file set the default database connection and enter the database credentials
3. Run the command php artisan make:model Product -m 
4. In the new App > product file insert a protected fillable array
5. in the new database > migrations > create products table configure the schema for the new products table
6. Run the commad php artisan make:seed ProductTableSeeder
7. In the new database > seeds > producttableseeder file create the initial products for your project

```
 public function run()
    {
        $product = new \App\Product([
            'imagePath' => '',
            'title' => 'Harry otter',
            'description' => 'great book',
            'price' => 10
         ]);
         $product->save();
    }
```

8. In the database > seeds > DatabaseSeeder.php file specify that you want to run the ProductTableSeeder file
9. Run php artisan migrate
10. Run php artisan db:seed

Create the models
-------------------
1. Cart model - items are grouped in the item array
2 Product model - uses books table
3. Purchase model - one to one relationship - a purchase belongs to a user
4. User model - one to many relationship - a user has many purchases. One to one relationship - a user has one profile

Create the view pages
----------------------

user:
1. Profile - displays user's orders
2. Signin
3. signup

shop:
1. checkout
2. index - main products page
3. shopping-cart

Create the controllers
----------------------

1. ProductController
2. userController

Create the routes
-----------------
Create url routes in the routes > web.php file.

Functionality
=============

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

Middleware authenitcation
-----------------------------

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
