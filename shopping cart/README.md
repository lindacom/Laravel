Laravel shopping cart
=======================

Tutorial: Shopping cart - https://www.youtube.com/playlist?list=PL55RiY5tL51qUXDyBqx0mKVOhLNFwwxvH

Set up the environment
------------------------
Download project repository
Change .env.example file to .env
Run the command php artisan key:generate

Set up the database
---------------------
In the .env file enter database connection credentials.
In the config > database.php file set the default database connection and enter the database credentials
Run the command php artisan make:model Product -m 
In the new App > product file insert a protected fillable array
in the new database > migrations > create products table configure the schema for the new products table
Run the commad php artisan make:seed ProductTableSeeder
In the new database > seeds > producttableseeder file create the initial products for your project

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

In the database > seeds > DatabaseSeeder.php file specify that you want to run the ProductTableSeeder file
Run php artisan migrate
Run php artisan db:seed

Create the view
----------------
Create a controller file - php artisan make:controller ProductController. Use the product model, create a getIndex action to get products

```
  public function getIndex() {
        $products = Product::all();
    return view('shop.index', ['products' => $products]);
    }
 ```
Create a route in the web.php file pointing to the index action of the ProductController

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
