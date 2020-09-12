Laravel shopping cart
=======================

Tutorial: Acemind - Laravel 5.2 PHP - Build a Shopping Cart
Shopping cart - https://www.youtube.com/playlist?list=PL55RiY5tL51qUXDyBqx0mKVOhLNFwwxvH

Set up the environment
------------------------
1. Download project repository
2. Change .env.example file to .env
3. Run the command php artisan key:generate to generate a key for your applicatio.

Set up the databases
---------------------
1.In the .env file enter database connection credentials.
2.In the config > database.php file set the default database connection and enter the database credentials
3.Run the command php artisan make:model Product -m 
4.In the new App > product file insert a protected fillable array
5.in the new database > migrations > create products table configure the schema for the new products table
6.Run the commad php artisan make:seed ProductTableSeeder
7.In the new database > seeds > producttableseeder file create the initial products for your project

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

8.In the database > seeds > DatabaseSeeder.php file specify that you want to run the ProductTableSeeder file
9.Run php artisan migrate
10.Run php artisan db:seed

Create the models
-------------------

Create the view pages
----------------------



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
