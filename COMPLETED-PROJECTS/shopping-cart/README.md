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
1. Profile


Create the controllers
----------------------

Create a controller file - php artisan make:controller ProductController. Use the product model, create a getIndex action to get products

```
  public function getIndex() {
        $products = Product::all();
    return view('shop.index', ['products' => $products]);
    }
 ```

Create the routes
-----------------
Create a route in the web.php file pointing to the index action of the ProductController

Functionality
=============

Output product data
-----------------------
In the view file loop through the products - @foreach($products as $product) @endforeach

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
     public function add($item, $id) { //add items to cart by id
        // store a new item in the storedItems array    
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' =>$item];
                if ($this->items) { //if the item already exists
           if (array_key_exists($id, $this->items)) {
               $storedItem = $this->items[$id];
           }
        }

        $storedItem['qty']++; //increase the quantity by one
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

Store orders in database table
----------------------------------
Create orders model (with a relation to a user) and table - php artisan make:model Order -m

```
 $order = new Order();
    $order->cart = serialize($cart);
    $order->address = $request->input('address');
    $order->name = $request->input('name');
    $order->payment_id = $charge->id;

    Auth::user()->orders()->save($order);
    
 ```
 
 Retrieve orders from database table
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
